<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Foto;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Notifications\SolicitudPremium;

class EstablecimientoEdit extends Component
{

    use WithFileUploads;

    public $logo;
    public $nombre;
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
    public $id_establecimiento;
    public $establecimiento;
    public $establecimiento_logo;
    public $establecimiento_premium;
    public $url;
    public $facebook;
    public $twitter;
    public $instagram;
    public $maps;
    public $fotos;

    protected function rules(){
        return[
            'nombre' => 'required|unique:establecimientos,nombre,' . $this->id_establecimiento,
            'slug' => 'required|unique:establecimientos,slug,' . $this->id_establecimiento,
            'tags' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'category_id' => 'required|exists:App\Models\Category,id',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'url' => 'url|nullable',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'instagram' => 'url|nullable',
            'maps' => 'url|nullable',
        ];
    }

    protected $messages = [
        'slug.required' => '',
        'slug.unique' => 'El nombre ya esta en uso.',
        'category_id.required' =>  'El campo categoría es obligatorio.',
        'tags.required' =>  'El campo etiquetas es obligatorio.'
    ];

    public function mount(){

        $this->fotos = Foto::where('uuid', $this->establecimiento->uuid)->get();

        $this->id_establecimiento = $this->establecimiento->id;

        if($this->establecimiento->imagen)
            $this->establecimiento_logo = $this->establecimiento->imagen->url;

        if($this->establecimiento->premium == 1)
            $this->establecimiento_premium = 1;
        else{
            $admin = User::find(1);
            $notificacion = $admin->notifications()->where('type', 'App\Notifications\SolicitudPremium')->where('data->establecimiemto_id', $this->id_establecimiento)->get();
            if(count($notificacion) > 0)
                $this->establecimiento_premium = 2;
        }

        $this->nombre = $this->establecimiento->nombre;
        $this->telefono = $this->establecimiento->telefono;
        $this->apertura = \Carbon\Carbon::parse($this->establecimiento->apertura)->format('h:i');
        $this->cierre = \Carbon\Carbon::parse($this->establecimiento->cierre)->format('h:i');
        $this->direccion = $this->establecimiento->direccion;
        $this->colonia = $this->establecimiento->colonia;
        $this->descripcion = $this->establecimiento->descripcion;
        $this->slug = $this->establecimiento->slug;
        $this->category_id = $this->establecimiento->category_id;;
        $this->uuid = $this->establecimiento->uuid;
        $this->url = $this->establecimiento->url;
        $this->facebook = $this->establecimiento->facebook;
        $this->twitter = $this->establecimiento->twitter;
        $this->instagram = $this->establecimiento->instagram;
        $this->maps = $this->establecimiento->maps;
    }

    public function render()
    {

        $categorias = Category::all();
        $etiquetas = Tag::all();

        return view('livewire.establecimiento-edit', compact('categorias', 'etiquetas'));
    }

    public function actualizar($contenido){

        $this->descripcion = $contenido;

        $this->slug = Str::slug($this->nombre);

        $this->validate();

        $this->establecimiento->update([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'direccion' => $this->direccion,
            'colonia' => $this->colonia,
            'telefono' => $this->telefono,
            'descripcion' => $contenido,
            'category_id' => $this->category_id,
            'apertura' => $this->apertura,
            'cierre' => $this->cierre,
            'url' => $this->url,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'maps' => $this->maps,
        ]);

        if($this->logo){
            $ruta_imagen = $this->logo->store('establecimientos','public');

            if($this->establecimiento->imagen){

                if(File::exists('storage/' . $this->establecimiento->imagen->url)){
                    File::delete('storage/' . $this->establecimiento->imagen->url);
                }
                $this->establecimiento->imagen()->update([
                    'url' => $ruta_imagen,
                ]);

            }else{

                $this->establecimiento->imagen()->create([
                    'url' => $ruta_imagen,

                ]);
            }
        }

        $this->establecimiento->tags()->sync($this->tags);

        $this->establecimiento->save();

        if($this->premium){
            $admin = User::find(1);
            $admin->notify(new SolicitudPremium($this->establecimiento));
        }

        return redirect()->route('establecimientos.mis_establecimientos');
    }
}
