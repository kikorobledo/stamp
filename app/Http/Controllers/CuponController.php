<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Foto;
use App\Models\Cupon;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\File;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupones = Cupon::where('estado', 'activo')->whereHas('establecimiento', function($q){
            $q->where('estado', 'activo');
        })->latest('id')->paginate(16);

        $banners = Banner::all();

        return view('cupones.index', compact('cupones', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cupones.create');
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
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        $this->authorize('published', $cupon);

        $categoria = $cupon->establecimiento->category;

        $establecimientos = Establecimiento::where('category_id', $categoria->id)->where('id', '!=', $cupon->establecimiento->id )->with('cupones', function($q){
            $q->where('estado','activo');
        })->get();

        $cupones = collect();

        foreach($establecimientos as $establecimiento){
            foreach($establecimiento->cupones as $cupon2){
                    $cupon2->nombre_establecimiento = $establecimiento->nombre;
                    $cupon2->tags = $establecimiento->tags;
                    $cupones->add($cupon2);
            }
        }

        $fotos = Foto::where('uuid', '=', $cupon->establecimiento->uuid)->get();

        $comentarios = Comentario::where('establecimiento_id', '=', $cupon->establecimiento->id)->get();

        return view('cupones.show', compact('cupon', 'cupones', 'fotos','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        $this->authorize('author', $cupon);

        return view('cupones.edit', compact('cupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        $this->authorize('author', $cupon);

        if($cupon->imagen){
            if(File::exists('storage/' . $cupon->imagen->url)){
                File::delete('storage/' . $cupon->imagen->url);
            }
        }

        $cupon->delete();

        return redirect()->route('cupones.mis_cupones');
    }

    public function category(Category $category){

        $establecimientos = Establecimiento::where('category_id', $category->id)->with('cupones', function($q){
            $q->where('estado','activo');
        })->get();

        $cupones = collect();

        foreach($establecimientos as $establecimiento){
            foreach($establecimiento->cupones as $cupon){
                $cupon->nombre_establecimiento = $establecimiento->nombre;
                $cupon->tags = $establecimiento->tags;
                $cupones->add($cupon);
            }
        }

        $pageSize = 12;

        $cupones = CollectionHelper::paginate($cupones, $pageSize);

        return view('cupones.category', compact('cupones', 'category'));
    }

    public function tag(Tag $tag){

        $establecimientos = $tag->establecimientos;

        $cupones = collect();

        foreach($establecimientos as $establecimiento){
            foreach($establecimiento->cupones as $cupon){
                if($cupon->estado == 'activo'){
                    $cupon->nombre_establecimiento = $establecimiento->nombre;
                    $cupon->tags = $establecimiento->tags;
                    $cupones->add($cupon);
                }
            }
        }

        $pageSize = 12;

        $cupones = CollectionHelper::paginate($cupones, $pageSize);

        return view('cupones.tag', compact('cupones', 'tag'));
    }

    public function categoria(Category $category){

        $establecimientos = $category->establecimientos;

        $cupones = collect();

        foreach($establecimientos as $establecimiento){
            foreach($establecimiento->cupones as $cupon){
                if($cupon->estado == 'activo'){
                    $cupon->nombre_establecimiento = $establecimiento->nombre;
                    $cupon->tags = $establecimiento->tags;
                    $cupones->add($cupon);
                }
            }
        }

        $pageSize = 12;

        $cupones = CollectionHelper::paginate($cupones, $pageSize);

        return view('cupones.categoria', compact('cupones', 'category'));
    }

    public function misCupones(){
        $establecimientos = Establecimiento::where('user_id', '=', auth()->user()->id)->where('estado','!=', 'eliminado')->with('cupones', function($q){return $q->where('estado', '!=', 'eliminado')->where('estado', '!=', 'expirado');})->orderBy('id','desc')->paginate(8);

        return view('cupones.mis_cupones', compact('establecimientos'));
    }
}
