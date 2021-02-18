<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imagiable');
    }
}
