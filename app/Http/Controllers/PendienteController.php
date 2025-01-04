<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinscripcion;
use Illuminate\Support\Facades\Auth;
use App\Models\Constancia;
use App\Models\Examen;

class PendienteController extends Controller
{
    public function index()
    {
        return view('alumnoview.pendiente.index');
    }

    public function pendiente()
    {
        $user = Auth::user();
        $reinscripciones = Reinscripcion::where('matricula', $user->User_name)
            ->where('reinscripcion_estatus', 'pendiente_validar_Reinscripcion')
            ->get();

        $constancias = Constancia::where('matricula', $user->User_name)
            ->where('constancia_estatus', 'pendiente_validar_constancia')
            ->get();
            
        $examenes = Examen::where('matricula', $user->User_name)
            ->where('examen_estatus', 'pendiente_validar_examen')
            ->get();

        return view('alumnoview.pendiente.index', compact('reinscripciones', 'constancias', 'examenes'));
    }
}