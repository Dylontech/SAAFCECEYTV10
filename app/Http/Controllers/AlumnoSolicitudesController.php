<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoSolicitudesController extends Controller
{
    public function index()
    {
        return view('alumnoview.alumnosolicitudes');
    }
}