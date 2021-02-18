<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class CrearComentario extends Component
{

    public $establecimiento;

    public $comentarios;

    public $contenido;

    protected function rules(){
        return[
            'contenido' => 'required|min:10'
        ];
    }

    public function mount(){
        $this->comentarios = $this->establecimiento->comentarios;
    }

    public function render()
    {
        $establecimiento = $this->establecimiento;

        return view('livewire.crear-comentario', compact('establecimiento'));
    }

    public function enviarComentario(){

        $this->validate();

        $comentario = Comentario::create([
            'contenido' => $this->contenido,
            'establecimiento_id' => $this->establecimiento->id,
            'user_id' => auth()->user()->id
        ]);

        $this->comentarios->push($comentario);

        $this->reset('contenido');
    }
}
