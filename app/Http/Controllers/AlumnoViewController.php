<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('alumnoview'); // Asegúrate de que el nombre del middleware esté correcto
    }

    public function index()
    {
        return view('AlumnoView'); // Asegúrate de que la vista exista y esté correctamente nombrada
    }
}