<?php

use App\Http\Controllers\FinancieroSolicitudesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:financiero'])->group(function () {
    Route::get('/departamento_financiero', function () {
        return view('departamento_financiero');
    })->name('departamento-financiero');
    Route::get('/financierosolicitudes.index', [FinancieroSolicitudesController::class, 'index'])->name('financierosolicitudes.index');
    Route::get('/financierosolicitudes.reporte', [FinancieroSolicitudesController::class, 'reporte'])->name('financierosolicitudes.reporte');
    Route::get('/financierosolicitudes.aprobadas', [FinancieroSolicitudesController::class, 'aprobadas'])->name('financierosolicitudes.aprobadas');
    Route::put('/financiero/constancia/{id}/approve', [FinancieroSolicitudesController::class, 'approveConstancia'])->name('financiero.constancia.approve');
    Route::delete('/financiero/constancia/{id}/reject', [FinancieroSolicitudesController::class, 'rejectConstancia'])->name('financiero.constancia.reject');
    Route::put('/financiero/examen/{id}/approve', [FinancieroSolicitudesController::class, 'approveExamen'])->name('financiero.examen.approve');
    Route::delete('/financiero/examen/{id}/reject', [FinancieroSolicitudesController::class, 'rejectExamen'])->name('financiero.examen.reject');
    Route::put('/financiero/reinscripcion/{id}/approve', [FinancieroSolicitudesController::class, 'approveReinscripcion'])->name('financiero.reinscripcion.approve');
    Route::delete('/financiero/reinscripcion/{id}/reject', [FinancieroSolicitudesController::class, 'rejectReinscripcion'])->name('financiero.reinscripcion.reject');
});