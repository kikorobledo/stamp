<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupon;
use App\Models\Codigo;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Notifications\CodigosCreados;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cupones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $establecimientos = Establecimiento::pluck('nombre', 'id');
        return view('admin.cupones.create', compact('establecimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'establecimiento_id' => 'required|exists:App\Models\Establecimiento,id',
            'nombre' => 'required',
            'slug' => 'required|unique:cupons',
            'precio' => 'min:0',
            'fecha_de_vencimiento' => 'required|after:start_date',
            'codigos' => 'integer|min:0',
            'estado' => 'required',
            'descripcion' => 'required'
        ]);

        $cupon = Cupon::create([
            'nombre' => $request->nombre,
            'establecimiento_id' => $request->establecimiento_id,
            'slug' => $request->slug,
            'precio' => $request->precio,
            'fecha_de_vencimiento' => $request->fecha_de_vencimiento,
            'descripcion' => $request->descripcion,
        ]);

        if($request->file('file')){
            $ruta_imagen = $request->file('file')->store('cupones','public');
            $cupon->imagen()->create([
                'url' => $ruta_imagen,

            ]);
        }

        $cupon->save();

        if($request->codigos > 0){

            do {
                $codes = [];

                for ($i = 0; $i < $request->input('codigos'); $i++) {
                    $codes[] = (string)mt_rand(pow(10, 10), pow(10, 11) - 1);
                }

                $codesUnique = Codigo::whereIn('codigo', $codes)->count() == 0;
            } while (!$codesUnique);

            for ($i=0; $i < count($codes); $i++) {
                Codigo::create([
                    'codigo' => $codes[$i],
                    'cupon_id' => $cupon->id,
                ]);
            }

            $usuario = $cupon->establecimiento->usuario;

            $usuario->notify(new CodigosCreados($cupon));
        }

        return redirect()->route('admin.cupones.index')->with('info', 'El cupón se creó con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  Cupon $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        return view('admin.cupones.show', compact('cupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Cupon $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        $establecimientos = Establecimiento::pluck('nombre', 'id');
        return view('admin.cupones.edit', compact('establecimientos', 'cupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Cupon $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        $request->validate([
            'establecimiento_id' => 'required|exists:App\Models\Establecimiento,id',
            'nombre' => 'required',
            'slug' => "required|unique:cupons,slug,$cupon->id",
            'precio' => 'min:0',
            'estado' => 'required',
            'fecha_de_vencimiento' => 'required|after:start_date',
            'codigos' => 'integer|min:0',
            'descripcion' => 'required'
        ]);

        $cupon->update($request->all());

        if($request->file('file')){

            $ruta_imagen = $request->file('file')->store('cupones','public');

            if($cupon->imagen){
                if(File::exists('storage/' . $cupon->imagen->url)){
                    File::delete('storage/' . $cupon->imagen->url);
                }

                $cupon->imagen()->update([
                    'url' => $ruta_imagen,
                ]);

            }else{
                $ruta_imagen = $request->file('file')->store('cupones','public');
                $cupon->imagen()->create([
                    'url' => $ruta_imagen,

                ]);
            }
        }

        $cupon->updated_at = now();
        $cupon->save();

        if($request->codigos > 0){

            do {
                $codes = [];

                for ($i = 0; $i < $request->input('codigos'); $i++) {
                    $codes[] = (string)mt_rand(pow(10, 10), pow(10, 11) - 1);
                }

                $codesUnique = Codigo::whereIn('codigo', $codes)->count() == 0;
            } while (!$codesUnique);

            for ($i=0; $i < count($codes); $i++) {
                Codigo::create([
                    'codigo' => $codes[$i],
                    'cupon_id' => $cupon->id,
                ]);
            }
        }

        return redirect()->route('admin.cupones.index')->with('info', 'El cupón se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Cupon $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        $cupon->delete();

        return redirect()->route('admin.cupones.index')->with('info', 'El cupón se eliminó con éxito.');
    }
}
