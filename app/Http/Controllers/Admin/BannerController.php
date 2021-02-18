<?php

namespace App\Http\Controllers\ADmin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(){

        $banners = Banner::all();

        return view('admin.banners.index', compact('banners'));
    }

    public function edit(Banner $banner){

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner){

        if($banner->imagen){

            if($request->file('file')){

                $ruta_imagen = $request->file('file')->store('banners','public');

                if($banner->imagen){
                    if(File::exists('storage/' . $banner->imagen->url)){
                        File::delete('storage/' . $banner->imagen->url);
                    }

                    $banner->imagen()->update([
                        'url' => $ruta_imagen,
                    ]);

                }else{
                    $ruta_imagen = $request->file('file')->store('banners','public');
                    $banner->imagen()->create([
                        'url' => $ruta_imagen,

                    ]);
                }
            }

        }else{

            if($request->file('file')){
                $ruta_imagen = $request->file('file')->store('banners','public');
                $banner->imagen()->create([
                    'url' => $ruta_imagen,

                ]);
            }

        }

        return redirect()->route('admin.banners.index');
    }
}
