<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Cupon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Establecimiento;
use App\Notifications\CuponCreado;

class CuponCreate extends Component
{

    use WithFileUploads;

    public $logo;
    public $nombre;
    public $establecimiento_id;
    public $fecha_de_vencimiento;
    public $descripcion;
    public $codigos;
    public $slug;

    protected function rules(){
        return[
            'establecimiento_id' => 'required|exists:App\Models\Establecimiento,id',
            'nombre' => 'required',
            'slug' => 'required|unique:cupons',
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

    public function render()
    {
        $establecimientos = Establecimiento::where('user_id', '=', auth()->user()->id)->where('estado','!=', 'eliminado')->get();

        return view('livewire.cupon-create', compact('establecimientos'));
    }

    public function guardar($contenido){
        $this->descripcion = $contenido;
        $this->slug = Str::slug($this->nombre);

        $this->validate();

        $cupon = Cupon::create([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'fecha_de_vencimiento' => $this->fecha_de_vencimiento,
            'descripcion' => $this->descripcion,
            'establecimiento_id' => $this->establecimiento_id,
            'estado' => 'revision',
            'codigos_solicitados' => $this->codigos
        ]);

        if($this->logo){
            $ruta_imagen = $this->logo->store('cupones','public');

            $cupon->imagen()->create([
                'url' => $ruta_imagen,
            ]);
        }

        $admin = User::find(1);
        $admin->notify(new CuponCreado($cupon));

        return redirect()->route('cupones.mis_cupones');
    }
}
