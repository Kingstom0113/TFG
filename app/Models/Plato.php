<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plato extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'carta_id'
    ];

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }
}
