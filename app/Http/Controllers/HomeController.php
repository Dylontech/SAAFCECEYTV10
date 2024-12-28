<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        switch ($user->User_tipo) {
            case 'admin':
                return redirect()->route('AdminView');
            case 'alumno':
                return redirect()->route('AlumnoView');
            case 'control_escolar':
                return redirect()->route('control-escolar');
            case 'financiero':
                return redirect()->route('departamento-financiero');
            default:
                return view('home');
        }
    }
}