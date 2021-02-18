<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Foto;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.establecimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Category::pluck('nombre', 'id');
        $tags = Tag::all();
        $usuarios = User::pluck('name', 'id');

        return view('admin.establecimientos.create', compact('categorias','tags', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* return $request->all(); */
        $request->validate([
            'user_id' => 'required',
            'nombre' => 'required',
            'slug' => 'required|unique:establecimientos',
            'tags' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'premium' => 'required',
            'url' => 'url|nullable',
            'estado' => 'required',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'instagram' => 'url|nullable',
            'maps' => 'url|nullable',
            'category_id' => 'required|exists:App\Models\Category,id',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required',
        ]);

        $establecimiento = Establecimiento::create($request->all());

        if($request->file('file')){
            $ruta_imagen = $request->file('file')->store('establecimientos','public');
            $establecimiento->imagen()->create([
                'url' => $ruta_imagen,

            ]);
        }

        $establecimiento->tags()->attach($request->tags);

        $establecimiento->save();


        return redirect()->route('admin.establecimientos.index')->with('info', 'El establecimiento se creó con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Establecimiento $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        return view('admin.establecimientos.show', compact('establecimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Establecimiento $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {

        $categorias = Category::pluck('nombre', 'id');
        $tags = Tag::all();
        $usuarios = User::pluck('name', 'id');

        $fotos = Foto::where('uuid', '=', $establecimiento->uuid)->get();

        return view('admin.establecimientos.edit', compact('establecimiento','categorias', 'tags', 'usuarios', 'fotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Establecimiento $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        /* return $request->all(); */
        $request->validate([
            'user_id' => 'required',
            'nombre' => 'required',
            'slug' => "required|unique:establecimientos,slug,$establecimiento->id",
            'tags' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'premium' => 'required',
            'estado' => 'required',
            'url' => 'url|nullable',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'instagram' => 'url|nullable',
            'maps' => 'url|nullable',
            'category_id' => 'required|exists:App\Models\Category,id',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
        ]);

        $establecimiento->update($request->all());

        $establecimiento->tags()->sync($request->tags);

        if($request->file('file')){

            $ruta_imagen = $request->file('file')->store('establecimientos','public');

            if($establecimiento->imagen){

                if(File::exists('storage/' . $establecimiento->imagen->url)){
                    File::delete('storage/' . $establecimiento->imagen->url);
                }

                $establecimiento->imagen()->update([
                    'url' => $ruta_imagen,
                ]);

            }else{

                $ruta_imagen = $request->file('file')->store('establecimientos','public');
                $establecimiento->imagen()->create([
                    'url' => $ruta_imagen,

                ]);
            }
        }

        $establecimiento->updated_at = now();
        $establecimiento->save();


        return redirect()->route('admin.establecimientos.index')->with('info', 'El establecimiento se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Establecimiento $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        if($establecimiento->imagen){
            if(File::exists('storage/' . $establecimiento->imagen->url)){
                File::delete('storage/' . $establecimiento->imagen->url);
            }
        }

        $fotos = Foto::where('uuid', '=', $establecimiento->uuid)->get();

        foreach ($fotos as $foto) {
            if(File::exists('storage/' . $foto->url)){
                File::delete('storage/' . $foto->url);
                $foto->delete();
            }
        }


        $establecimiento->delete();

        return redirect()->route('admin.establecimientos.index')->with('info', 'El establecimiento se elimino con exito');
    }
}
