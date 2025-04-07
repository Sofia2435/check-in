<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEquipos extends Model
{
    use HasFactory;

    protected $table = 'registro_equipos';

    protected $fillable = [
        'user_id',
        'tipo_equipo',
        'nombre_equipo',
        'marca',
        'serial',
        'descripcion',
    ];

    /**
     * Relación: un registro de equipo pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);  // Si tienes un campo user_id en la tabla equipos
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
    
    public function aprendiz()
    {
        return $this->belongsTo(Aprendiz::class);
    }
}
