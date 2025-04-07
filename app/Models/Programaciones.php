<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programaciones extends Model
{
    use HasFactory;

    protected $table = 'programaciones'; // nombre personalizado si no es plural estándar

    protected $fillable = [
        'user_id',
        'nombre_asignatura',
        'descripcion',
        'ficha',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'ambiente',
    ];

    /**
     * Relación: una programación pertenece a un usuario (instructor).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
