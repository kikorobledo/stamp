<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Foto;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Establecimiento;


class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establecimientos = Establecimiento::all();

        return view('establecimientos.index', compact('establecimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('establecimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        $this->authorize('published', $establecimiento);

        $fotos = Foto::where('uuid', '=', $establecimiento->uuid)->get();

        return view('establecimientos.show', compact('establecimiento', 'fotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        $this->authorize('author', $establecimiento);

        return view('establecimientos.edit', compact('establecimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        $this->authorize('author', $establecimiento);

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

        return redirect()->route('establecimientos.mis_establecimientos');
    }

    public function misEstablecimientos(){
        $establecimientos = Establecimiento::where('user_id', '=', auth()->user()->id)->where('estado','!=', 'eliminado')->orderBy('id','desc')->paginate(8);

        return view('establecimientos.mis_establecimientos', compact('establecimientos'));
    }
}
