<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarnetDigital extends Model
{
    use HasFactory;

    protected $table = 'carnet_digitals';

    protected $fillable = [
        'user_id',
        'tipo_usuario',
        'nombre_completo',
        'ficha',
        'programa',
        'jornada',
        'foto',
    ];

    /**
     * Relación: un carnet pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
