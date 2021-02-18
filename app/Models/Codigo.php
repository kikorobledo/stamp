<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Codigo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'cupon_id', 'reservado_el', 'reservado_por', 'canjeado_el', 'canjeado_por'];

    public function cupon(){
        return $this->belongsTo(Cupon::class);
    }

    public function resservadoPor(){
        return $this->belongsTo(User::class, 'reservado_por');
    }

    public function canjeadoPor(){
        return $this->belongsTo(User::class, 'canjeado_por');
    }
}
