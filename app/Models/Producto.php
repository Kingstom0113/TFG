<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'alérgenos'];

    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'platos_productos');
    }
}
