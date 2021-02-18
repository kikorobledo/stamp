<?php

namespace App\Models;

use App\Models\Foto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Establecimiento extends Model
{
    use HasFactory;

    protected $fillable =['nombre', 'category_id', 'direccion','colonia', 'telefono', 'descripcion', 'apertura', 'cierre','user_id','url', 'slug', 'uuid','facebook','twitter','instagram','maps','premium', 'estado'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imagiable');
    }

    public function cupones(){
        return $this->hasMany(Cupon::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
