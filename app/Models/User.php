<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\CarnetDigital;
use App\Models\RegistroEquipos;
use App\Models\Justificaciones;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["aprendiz", "admin", "instructor"][$value],
        );
    }

    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class);
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function carnet()
    {
        return $this->hasOne(CarnetDigital::class);
    }

    public function registroEquipos()
    {
        return $this->hasMany(RegistroEquipos::class);
    }
    public function justificaciones()
    {
        return $this->hasMany(Justificaciones::class);
    }

    public function equipos()
    {
        return $this->hasMany(RegistroEquipos::class);
    }
}
