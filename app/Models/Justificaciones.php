<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'motivo',
        'documento',
    ];

    /**
     * Relación: una justificación pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
