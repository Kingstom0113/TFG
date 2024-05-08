<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carta extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['nombre', 'descripcion', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function platos()
    {
        return $this->hasMany(Plato::class);
    }

    public function categories()
    {
        return $this->hasMany(Categories::class);
    }
}
