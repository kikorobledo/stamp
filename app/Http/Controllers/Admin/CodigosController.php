<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupon;
use App\Models\Codigo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.codigos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cupones = Cupon::pluck('nombre', 'id');

        return view('admin.codigos.create', compact('cupones'));
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
            'cupon_id' => 'required|exists:App\Models\Cupon,id',
            'codigo' => 'required'
        ]);

        $codigo = Codigo::create($request->all());

        $codigo->save();

        return redirect()->route('admin.codigos.index')->with('info', 'El código de creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show(Codigo $codigo)
    {
        return view('admin.codigos.show', compact('codigo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit(Codigo $codigo)
    {
        $cupones = Cupon::pluck('nombre', 'id');

        return view('admin.codigos.edit', compact('codigo', 'cupones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigo $codigo)
    {
        $request->validate([
            'cupon_id' => 'required|exists:App\Models\Cupon,id',
            'codigo' => 'required'
        ]);

        $codigo->update($request->all());

        $codigo->save();

        return redirect()->route('admin.codigos.index')->with('info', 'El código de creó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codigo $codigo)
    {
        $codigo->delete();

        return redirect()->route('admin.codigos.index')->with('info', 'El código de eliminó con éxito.');
    }
}
