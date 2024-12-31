<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoSolicitudesController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all(); // Obtener todos los alumnos

        return view('alumnoview.alumnosolicitudes', compact('alumnos'));
    }
}