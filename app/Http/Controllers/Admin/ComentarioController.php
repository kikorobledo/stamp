<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comentarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $establecimientos = Establecimiento::pluck('nombre', 'id');

        return view('admin.comentarios.create', compact('establecimientos'));
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
            'descripcion' => 'required'
        ]);

        $comentario = Comentario::create([
            'contenido' => $request->descripcion,
            'establecimiento_id' => $request->establecimiento_id,
            'user_id' => auth()->user()->id
        ]);

        $comentario->save();

        return redirect()->route('admin.comentarios.index')->with('info', 'El comentario se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        $establecimientos = Establecimiento::pluck('nombre', 'id');
        return view('admin.comentarios.edit', compact('comentario', 'establecimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        $request->validate([
            'establecimiento_id' => 'required|exists:App\Models\Establecimiento,id',
            'contenido' => 'required',
            'user_id' => 'required'
        ]);

        $comentario->update($request->all());

        return redirect()->route('admin.comentarios.index')->with('info', 'El comentario se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return redirect()->route('admin.comentarios.index')->with('info', 'El comentario se eliminó con éxito.');
    }
}
