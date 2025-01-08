<?php

use App\Http\Controllers\ConEscSolicitudesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesoreController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\BlogController;

Route::middleware(['role:control_escolar'])->group(function () {
    Route::get('/control_escolar', function () {
        return view('control_escolar');
    })->name('control-escolar');
    Route::resource('/profesores', App\Http\Controllers\ProfesoreController::class);
    Route::resource('/materias', App\Http\Controllers\MateriaController::class);
    Route::resource('/blogs', BlogController::class);
    Route::get('/blog.index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/control_escolar', [BlogController::class, 'control_escolar'])->name('control-escolar');
    Route::get('/conescsolicitudes.index', [ConEscSolicitudesController::class, 'index'])->name('conescsolicitudes.index');
    Route::get('/conescsolicitudes', [ConEscSolicitudesController::class, 'conescpendiente'])->name('conescsolicitudes');
    Route::put('/conesc/reinscripcion/approve/{id}', [ConEscSolicitudesController::class, 'approveReinscripcionConEsc'])->name('conesc.reinscripcion.approve');
    Route::delete('/conesc/reinscripcion/reject/{id}', [ConEscSolicitudesController::class, 'rejectReinscripcionConEsc'])->name('conesc.reinscripcion.reject');
    Route::put('/conesc/constancia/approve/{id}', [ConEscSolicitudesController::class, 'approveConstanciaConEsc'])->name('conesc.constancia.approve');
    Route::delete('/conesc/constancia/reject/{id}', [ConEscSolicitudesController::class, 'rejectConstanciaConEsc'])->name('conesc.constancia.reject');
    Route::put('/conesc/examen/approve/{id}', [ConEscSolicitudesController::class, 'approveExamenConEsc'])->name('conesc.examen.approve');
    Route::delete('/conesc/examen/reject/{id}', [ConEscSolicitudesController::class, 'rejectExamenConEsc'])->name('conesc.examen.reject');
    Route::get('/conescsolicitudes/solapr', [ConEscSolicitudesController::class, 'solapr'])->name('conescsolicitudes.solapr');
});