<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinscripcion;
use App\Models\Constancia;
use App\Models\Examen;

class ConEscSolicitudesController extends Controller
{
    public function index()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'pendiente_validar_Reinscripcion')
            ->get();
        $constancias = Constancia::where('constancia_estatus', 'pendiente_validar_constancia')
            ->get();
        $examenes = Examen::where('examen_estatus', 'pendiente_validar_examen')
            ->get();
        
        return view('ConEscSolicitudes.index', compact('reinscripciones', 'constancias', 'examenes'));
    }

    public function conescpendiente()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'pendiente_validar_Reinscripcion')
            ->get();

        $constancias = Constancia::where('constancia_estatus', 'pendiente_validar_constancia')
            ->get();

        $examenes = Examen::where('examen_estatus', 'pendiente_validar_examen')
            ->get();

        return view('ConEscSolicitudes.index', compact('reinscripciones', 'constancias', 'examenes'));
    }

    public function approveReinscripcion($id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        $reinscripcion->reinscripcion_estatus = 'pendiente_reinscripcion_financiero';
        $reinscripcion->save();

        return redirect()->route('conescsolicitudes.index');
    }

    public function rejectReinscripcion($id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        $reinscripcion->delete();

        return redirect()->route('conescsolicitudes.index');
    }

    public function approveConstancia($id)
    {
        $constancia = Constancia::findOrFail($id);
        $constancia->constancia_estatus = 'pendiente_constancia_financiero';
        $constancia->save();

        return redirect()->route('conescsolicitudes.index');
    }

    public function rejectConstancia($id)
    {
        $constancia = Constancia::findOrFail($id);
        $constancia->delete();

        return redirect()->route('conescsolicitudes.index');
    }

    public function approveExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->examen_estatus = 'pendiente_examen_financiero';
        $examen->save();

        return redirect()->route('conescsolicitudes.index');
    }

    public function rejectExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();

        return redirect()->route('conescsolicitudes.index');
    }
    public function solapr()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'pendiente_reinscripcion_financiero')->get();
        $constancias = Constancia::where('constancia_estatus', 'pendiente_constancia_financiero')->get();
        $examenes = Examen::where('examen_estatus', 'pendiente_examen_financiero')->get();

        return view('Conescsolicitudes.SolApr', compact('reinscripciones', 'constancias', 'examenes'));
    }
}