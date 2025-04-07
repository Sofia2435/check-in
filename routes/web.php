<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AprendizController;

use App\Http\Controllers\Aprendiz\AprendizRegistroEquipoController;
use App\Http\Controllers\instructor\InstructorRegistroEquipoController;
use App\Http\Controllers\admin\AdminRegistroEquipoController;
use App\Http\Controllers\Admin\AdminAprendizController;
use App\Http\Controllers\admin\AdminInstructorController;
use App\Http\Controllers\admin\AdminProgramacionesController;
use App\Http\Controllers\aprendiz\AprendizCarnetDigitalController;
use App\Http\Controllers\instructor\InstructorCarnetDigitalController;
use App\Models\CarnetDigital;
use App\Http\Controllers\admin\AdminCarnetDigitalController;
use App\Http\Controllers\aprendiz\AprendizProgramacionesController;
use App\Http\Controllers\instructor\InstructorProgramacionController;
use App\Http\Controllers\admin\AdminJustificacionesController;
use App\Http\Controllers\aprendiz\AprendizJustificacionesController;
use App\Http\Controllers\instructor\InstructorJustificacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('aprendices', AdminAprendizController::class);
    Route::resource('instructor', AdminInstructorController::class);

    Route::resource('registros-equipo', AdminRegistroEquipoController ::class);
    Route::resource('registro-equipo', AprendizRegistroEquipoController::class);

    Route::resource('programaciones', AdminProgramacionesController::class);
 
    Route::resource('carnet__digital', AdminCarnetDigitalController::class);

    Route::resource('admin/justificaciones', AdminJustificacionesController::class);

});

Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructores/dashboard', [InstructorController::class, 'dashboard'])->name('instructores.dashboard');

    Route::resource('registro_equipo', InstructorRegistroEquipoController::class);
    Route::resource('carnet_digital', InstructorCarnetDigitalController::class);

    Route::get('/admin/programacions', [InstructorProgramacionController::class, 'index'])->name('programacions.index');
    Route::get('/instructores/programacions/{id}', [InstructorProgramacionController::class, 'show'])->name('instructores.programacions.show');

    Route::resource('instructores/justificacion', InstructorJustificacionesController::class)->names('instructores.justificacion');
});


Route::middleware(['auth', 'role:aprendiz'])->group(function () {
    Route::get('/aprendiz/dashboard', [AprendizController::class, 'dashboard'])->name('aprendiz.dashboard');

    Route::resource('registro-equipo', AprendizRegistroEquipoController::class);
    Route::resource('carnet_digitals', AprendizCarnetDigitalController::class);
    
    Route::get('/aprendiz/carnet', [AprendizCarnetDigitalController::class, 'showCarnet'])->name('aprendiz.carnet');

    Route::get('/admin/programacioness', [AprendizProgramacionesController::class, 'index'])->name('programacioness.index');
    Route::get('/aprendiz/programacioness/{id}', [AprendizProgramacionesController::class, 'show'])->name('aprendiz.programacioness.show');

    Route::resource('aprendiz/justificacion', AprendizJustificacionesController::class)->names('aprendiz.justificacion');


});

Route::get('/home',[HomeController::class, 'index'])->name('home');