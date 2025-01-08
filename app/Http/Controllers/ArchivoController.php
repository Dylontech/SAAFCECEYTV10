<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reinscripcion;
use App\Models\Constancia;
use App\Models\Examen;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function uploadReinscripcion(Request $request, $id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        if ($request->hasFile('reinscripcion_archivo_foto')) {
            $path = $request->file('reinscripcion_archivo_foto')->store('reinscripciones');
            $reinscripcion->reinscripcion_archivo_foto = $path;
            $reinscripcion->save();
        }
        return redirect()->route('conescsolicitudes.index');
    }

    public function downloadReinscripcion($id)
    {
        $reinscripcion = Reinscripcion::findOrFail($id);
        return Storage::download($reinscripcion->reinscripcion_archivo_foto);
    }

    public function uploadConstancia(Request $request, $id)
    {
        $constancia = Constancia::findOrFail($id);
        if ($request->hasFile('constancia_archivo_foto')) {
            $path = $request->file('constancia_archivo_foto')->store('constancias');
            $constancia->constancia_archivo_foto = $path;
            $constancia->save();
        }
        return redirect()->route('conescsolicitudes.index');
    }

    public function downloadConstancia($id)
    {
        $constancia = Constancia::findOrFail($id);
        return Storage::download($constancia->constancia_archivo_foto);
    }

    public function uploadExamen(Request $request, $id)
    {
        $examen = Examen::findOrFail($id);
        if ($request->hasFile('examen_archivo_foto')) {
            $path = $request->file('examen_archivo_foto')->store('examenes');
            $examen->examen_archivo_foto = $path;
            $examen->save();
        }
        return redirect()->route('conescsolicitudes.index');
    }

    public function downloadExamen($id)
    {
        $examen = Examen::findOrFail($id);
        return Storage::download($examen->examen_archivo_foto);
    }
}