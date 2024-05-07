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
        'categoria_id'
    ];

    /**
     * Los atributos que deben ser tratados como tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'precio' => 'decimal:2',
    ];

    /**
     * Obtener la categoría a la que pertenece el plato.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
