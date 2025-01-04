<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinscripcion;
use App\Models\Constancia;
use App\Models\Examen;


class ConEscAprobadasController extends Controller
{
    public function index()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'pendiente_reinscripcion_financiero')
            ->get();
        $constancias = Constancia::where('constancia_estatus', 'pendiente_constancia_financiero')
            ->get();
        $examenes = Examen::where('examen_estatus', 'pendiente_examen_financiero')
            ->get();
        return view('ConEscAprobadas.index');
    }
    
}
