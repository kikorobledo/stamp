<?php

namespace App\Models;

use App\Models\Establecimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function establecimientos(){
        return $this->belongsToMany(Establecimiento::class);
    }
}
