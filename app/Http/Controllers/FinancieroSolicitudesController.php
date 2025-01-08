<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinscripcion;
use App\Models\Constancia;
use App\Models\Examen;

class FinancieroSolicitudesController extends Controller
{
    public function index()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'pendiente_reinscripcion_financiero')->get();
        $constancias = Constancia::where('constancia_estatus', 'pendiente_constancia_financiero')->get();
        $examenes = Examen::where('examen_estatus', 'pendiente_examen_financiero')->get();
        
        return view('financierosolicitudes.index', compact('reinscripciones', 'constancias', 'examenes'));
    }
    
    public function reporte()
    {
        return view('financierosolicitudes.reporte');
    }

    public function approveConstancia($id)
    {
        $constancia = Constancia::findOrFail($id);
        $constancia->constancia_estatus = 'aprobado_constancia_financiero';
        $constancia->save();

        return redirect()->route('financierosolicitudes.index');
    }

    public function rejectConstancia($id)
    {
        $constancia = Constancia::findOrFail($id);
        $constancia->delete();

        return redirect()->route('financierosolicitudes.index');
    }

    public function approveExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->examen_estatus = 'aprobado_examen_financiero';
        $examen->save();

        return redirect()->route('financierosolicitudes.index');
    }

    public function rejectExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();

        return redirect()->route('financierosolicitudes.index');
    }

    public function approveReinscripcion($id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        $reinscripcion->reinscripcion_estatus = 'aprobado_reinscripcion_financiero';
        $reinscripcion->save();

        return redirect()->route('financierosolicitudes.index');
    }

    public function rejectReinscripcion($id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        $reinscripcion->delete();

        return redirect()->route('financierosolicitudes.index');
    }

    public function aprobadas()
    {
        $reinscripciones = Reinscripcion::where('reinscripcion_estatus', 'aprobado_reinscripcion_financiero')->get();
        $constancias = Constancia::where('constancia_estatus', 'aprobado_constancia_financiero')->get();
        $examenes = Examen::where('examen_estatus', 'aprobado_examen_financiero')->get();
        
        return view('financierosolicitudes.aprobadas', compact('reinscripciones', 'constancias', 'examenes'));
    }
}