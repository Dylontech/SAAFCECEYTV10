<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Reinscripcion;

class ReinscripcionController extends Controller
{
    public function reinscripcion()
    {
        // Your logic here
        $alumnos = Alumno::all();
        return view('alumnoview.reinscripcion.index');
        
    }
    public function store(Request $request)
{
    
    // Validar y guardar los datos en la base de datos
    $request->validate([
        'nombre' => 'required',
        'CURP' => 'required|string|max:18',
        'matricula' => 'required|string|max:10',
        'reinscripcion_semestre' => 'required',
        // 'reinscripcion_estatus' => 'required', // Remove this line
    ]);

    // Set the status automatically
    $reinscripcion = new Reinscripcion();
    $reinscripcion->nombre = Auth::user()->name;
    $reinscripcion->CURP = $request->input('CURP');
    $reinscripcion->matricula = $request->input('matricula');
    $reinscripcion->reinscripcion_semestre = $request->input('reinscripcion_semestre');
    $reinscripcion->reinscripcion_estatus = 'pendiente_validar_Reinscripcion';
    $reinscripcion->save();

    return redirect()->route('alumnoview')->with('success', 'Reinscripcion creado exitosamente.');
}
public function create()
    {
        return view('alumnoview', compact('alumnos'));
    }
    public function index()
    {
        $reinscripciones = Reinscripcion::all();
       
        return view('alumnoview', compact('reinscripciones', 'alumnos'));
    }
    public function show($id)
    {
      
        $reinscripcion = Reinscripcion::findOrFail($id);
        return view('alumnoview.reinscripcion.index', compact('reinscripcion'));
    }
    public function edit($id)
    {
        $alumnos = Alumno::all();
        $reinscripcion = Reinscripcion::findOrFail($id);
        return view('alumnoview.reinscripcion.edit', compact('reinscripcion'));
    }
    public function update(Request $request, $id)
    {
        ;
        $request->validate([
            'alumno_id' => 'required',
            'CURP' => 'required|string|max:18',
            'matricula' => 'required|string|max:10',
            'reinscripcion_semestre' => 'required',
            'reinscripcion_estatus' => 'required',
        ]);

        $reinscripcion = Reinscripcion::findOrFail($id);
        $reinscripcion->alumno_id = $request->input('alumno_id');
        $reinscripcion->CURP = $request->input('CURP');
        $reinscripcion->matricula = $request->input('matricula');
        $reinscripcion->reinscripcion_semestre = $request->input('reinscripcion_semestre');
        $reinscripcion->reinscripcion_estatus = $request->input('reinscripcion_estatus');
        $reinscripcion->save();

        return redirect()->route('reinscripcion.index')->with('success', 'Reinscripción actualizada con éxito.');
    }
}
