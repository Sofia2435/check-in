<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\CarnetDigital;
use App\Models\RegistroEquipos;
use App\Models\Justificaciones;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carnet()
    {
        return $this->hasOne(CarnetDigital::class, 'user_id', 'user_id');
    }

    public function registroEquipos()
    {
        return $this->hasMany(RegistroEquipos::class, 'user_id', 'user_id');
    }

    public function programaciones()
    {
        return $this->hasMany(Programaciones::class);
    }

    public function justificaciones()
    {
        return $this->hasMany(Justificaciones::class);
    }
}
