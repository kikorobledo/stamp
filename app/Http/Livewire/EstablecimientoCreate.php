<?php

namespace App\Http\Livewire;
use App\Models\Tag;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Establecimiento;
use App\Notifications\SolicitudPremium;

class EstablecimientoCreate extends Component
{

    use WithFileUploads;

    public $logo;
    public $nombre;
    public $categoria;
    public $telefono;
    public $apertura;
    public $cierre;
    public $direccion;
    public $colonia;
    public $descripcion;
    public $premium;
    public $slug;
    public $category_id;
    public $uuid;
    public $tags = [];

    protected function rules(){
        return[
            'nombre' => 'required',
            'slug' => 'required|unique:establecimientos',
            'tags' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'category_id' => 'required|exists:App\Models\Category,id',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required',
        ];
    }

    protected $messages = [
        'slug.required' => '',
        'slug.unique' => 'El nombre ya esta en uso.',
        'category_id.required' =>  'El campo categoría es obligatorio.',
        'tags.required' =>  'El campo etiquetas es obligatorio.'
    ];

    public function render()
    {

        $categorias = Category::all();
        $etiquetas = Tag::all();

        return view('livewire.establecimiento-create', compact('categorias', 'etiquetas'));
    }

    public function guardar($contenido){
        $this->descripcion = $contenido;
        $this->uuid = Str::slug($this->nombre);
        $this->slug = Str::slug($this->nombre);

        $this->validate();

        $establecimiento = Establecimiento::create([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'direccion' => $this->direccion,
            'colonia' => $this->colonia,
            'telefono' => $this->telefono,
            'descripcion' => $this->descripcion,
            'category_id' => $this->category_id,
            'apertura' => $this->apertura,
            'cierre' => $this->cierre,
            'uuid' => $this->uuid,
            'user_id' => auth()->user()->id,
            'estado' => 'revision',

        ]);

        if($this->premium){
            $admin = User::find(1);
            $admin->notify(new SolicitudPremium($establecimiento));
        }

        if($this->logo){
            $ruta_imagen = $this->logo->store('establecimientos','public');

            $establecimiento->imagen()->create([
                'url' => $ruta_imagen,
            ]);
        }

        $establecimiento->tags()->attach($this->tags);

        $establecimiento->save();

        return redirect()->route('establecimientos.mis_establecimientos');
    }
}
