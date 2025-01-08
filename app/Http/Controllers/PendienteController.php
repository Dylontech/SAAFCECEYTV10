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
        $reinscripcionesPendientes = Reinscripcion::where('matricula', $user->User_name)
            ->where('reinscripcion_estatus', 'pendiente_validar_Reinscripcion')
            ->get();

        $constanciasPendientes = Constancia::where('matricula', $user->User_name)
            ->where('constancia_estatus', 'pendiente_validar_constancia')
            ->get();
            
        $examenesPendientes = Examen::where('matricula', $user->User_name)
            ->where('examen_estatus', 'pendiente_validar_examen')
            ->get();

        $reinscripcionesAprobadas = Reinscripcion::where('matricula', $user->User_name)
            ->where('reinscripcion_estatus', 'aprobado_reinscripcion_financiero')
            ->get();

        $constanciasAprobadas = Constancia::where('matricula', $user->User_name)
            ->where('constancia_estatus', 'aprobado_constancia_financiero')
            ->get();
            
        $examenesAprobadas = Examen::where('matricula', $user->User_name)
            ->where('examen_estatus', 'aprobado_examen_financiero')
            ->get();

        return view('alumnoview.pendiente.index', compact('reinscripcionesPendientes', 'constanciasPendientes', 'examenesPendientes', 'reinscripcionesAprobadas', 'constanciasAprobadas', 'examenesAprobadas'));
    }
}