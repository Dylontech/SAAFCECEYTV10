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
                return redirect()->route('adminview');
            case 'alumno':
                return redirect()->route('alumnoview');
            case 'control_escolar':
                return redirect()->route('control_escolar');
            case 'financiero':
                return redirect()->route('departamento_financiero');
            default:
                return view('home');
        }
    }
}