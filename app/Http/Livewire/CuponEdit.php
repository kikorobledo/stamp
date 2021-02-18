<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\File;

class CuponEdit extends Component
{
    use WithFileUploads;

    public $logo;
    public $nombre;
    public $cupon_id;
    public $fecha_de_vencimiento;
    public $establecimiento_id;
    public $descripcion;
    public $slug;
    public $cupon;
    public $codigos;
    public $cupon_logo;

    protected function rules(){
        return[
            'establecimiento_id' => 'required|exists:App\Models\Establecimiento,id',
            'nombre' => 'required|unique:cupons,nombre,' . $this->cupon_id,
            'slug' => 'required|unique:cupons,slug,' . $this->cupon_id,
            'fecha_de_vencimiento' => 'required|after:start_date',
            'codigos' => 'integer|min:0',
            'descripcion' => 'required'
        ];
    }

    protected $messages = [
        'slug.required' => '',
        'slug.unique' => 'El nombre ya esta en uso.',
        'establecimiento_id.required' =>  'El campo establecimiento es obligatorio.',
        'fecha_de_vencimiento' =>  'El campo fecha de vencimiento es obligatorio.',
    ];

    public function mount(){

        if($this->cupon->imagen)
            $this->cupon_logo = $this->cupon->imagen->url;

        $this->nombre = $this->cupon->nombre;
        $this->cupon_id = $this->cupon->id;
        $this->establecimiento_id = $this->cupon->establecimiento_id;
        $this->codigos = $this->cupon->codigos_solicitados;
        $this->fecha_de_vencimiento = $this->cupon->fecha_de_vencimiento;
        $this->descripcion = $this->cupon->descripcion;
    }

    public function render()
    {
        $establecimientos = Establecimiento::where('user_id', '=', auth()->user()->id)->where('estado','!=', 'eliminado')->get();

        return view('livewire.cupon-edit', compact('establecimientos'));
    }

    public function actualizar($descripcion){
        $this->descripcion = $descripcion;
        $this->slug = Str::slug($this->nombre);

        $this->validate();

        $this->cupon->update([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'establecimiento_id' => $this->establecimiento_id,
            'descripcion' => $descripcion,
        ]);

        if($this->logo){
            $ruta_imagen = $this->logo->store('cupones','public');

            if($this->cupon->imagen){

                if(File::exists('storage/' . $this->cupon->imagen->url)){
                    File::delete('storage/' . $this->cupon->imagen->url);
                }
                $this->cupon->imagen()->update([
                    'url' => $ruta_imagen,
                ]);

            }else{

                $this->cupon->imagen()->create([
                    'url' => $ruta_imagen,

                ]);
            }
        }

        $this->cupon->save();

        return redirect()->route('cupones.mis_cupones');
    }
}
