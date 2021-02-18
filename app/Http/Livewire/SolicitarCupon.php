<?php

namespace App\Http\Livewire;

use App\Models\Codigo;
use Livewire\Component;

class SolicitarCupon extends Component
{

    public $cupon;
    public $codigo;
    public $disponibilidad = true;

    public function mount(){
        $codigos = Codigo::where('cupon_id', $this->cupon->id)->get();

        if(auth()->user()){
            foreach ($codigos  as $code) {
                if($code->canjeado_por == auth()->user()->id){
                    $this->disponibilidad = false;
                    $this->codigo = $code;
                    break;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.solicitar-cupon');
    }

    public function solicitar(){
        if(!$this->codigo){
            $this->disponibilidad = false;
            $this->codigo = Codigo::where('cupon_id', $this->cupon->id)->where('canjeado_por', "=", null)->first();

            if($this->codigo){
                $this->codigo->canjeado_por = auth()->user()->id;
                $this->codigo->canjeado_el = now();
                $this->codigo->save();
            }
        }

    }

}
