<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    public function store(Request $request){

        $ruta_imagen = $request->file('file')->store('establecimientos', 'public');

        /* $imagen = Image::make(public_path("storage/${ruta_imagen}"))->fit(800,450);
        $imagen->save(); */

        $foto = Foto::create([
            'uuid' => $request->uuid,
            'url' => $ruta_imagen
        ]);

        $foto->save();

        $respuesta = [
            'archivo' => $ruta_imagen
        ];

        return response()->json($respuesta);
    }

    public function destroy(Request $request){

        $imagen = $request->imagen;

        if(File::exists('storage/' . $imagen)){

            File::delete('storage/' . $imagen);

            Foto::where('url', '=', $imagen)->delete();

            $respuesta = [
                'mensaje' => 'imagen eliminada',
                'imagen' => $imagen
            ];

        }

        return response()->json($respuesta);
    }
}
