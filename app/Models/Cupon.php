<?php

namespace App\Models;

use App\Models\User;
use App\Models\Codigo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','slug', 'fecha_de_vencimiento', 'descripcion', 'precio', 'estado', 'establecimiento_id','codigos_solicitados'];

    protected $appends = ['CantidadCodigos'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imagiable');
    }

    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class);
    }

    public function codigos(){
        return $this->hasMany(Codigo::class);
    }

    /* Obtener el número de codigos disponibles */
    public function getCantidadCodigosAttribute(){

        $codigos = Codigo::where('cupon_id', '=', $this->id)->get();

        return count($codigos);
    }
}
