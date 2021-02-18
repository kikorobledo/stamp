<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformacionController extends Controller
{
    public function aviso_de_privacidad(){
        return view('informacion.aviso_de_privacidad');
    }

    public function terminos_y_condiciones_de_uso(){
        return view('informacion.terminos_y_condiciones_de_uso');
    }
}
