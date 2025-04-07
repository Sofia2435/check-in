<?php
namespace App\Enums;

enum UserRole: string {
    case Aprendiz = 'aprendiz';
    case Instructor = 'instructor';
    case Administrador = 'administrador';
}