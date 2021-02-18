<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['contenido','establecimiento_id', 'user_id'];


    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
