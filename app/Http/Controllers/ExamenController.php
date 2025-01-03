<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Profesore;
use App\Models\Materia;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function create()
    {
        $profesores = Profesore::all();
        $materias = Materia::all();
        $alumnos = Alumno::all();

        return view('alumnoview', compact('profesores', 'materias', 'alumnos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'profesor_id' => 'required',
        'materia_id' => 'required',
        'alumno_id' => 'required',
        'CURP' => 'required|string|max:18',
        'matricula' => 'required|string|max:10',
        'examen_estatus' => 'required|string',
        'exam_types' => 'required|array',
    ]);

    $examen = Examen::create([
        'profesor_id' => $request->profesor_id,
        'materia_id' => $request->materia_id,
        'alumno_id' => $request->alumno_id,
        'CURP' => $request->CURP,
        'matricula' => $request->matricula,
        'examen_estatus' => $request->examen_estatus,
        'examen_tipo' => implode(', ', $request->exam_types),
    ]);

    return redirect()->route('alumnoview')->with('success', 'Examen creado exitosamente.');
}

    public function index()
    {
        $examenes = Examen::all();
        $profesores = Profesore::all();
        $materias = Materia::all();
        $alumnos = Alumno::all();
        return view('alumnoview.examen.index', compact('examenes', 'profesores', 'materias', 'alumnos'));
    }

    public function show($id)
    {
        $examen = Examen::findOrFail($id);
        return view('alumnoview.examen.index', compact('examen'));
    }

    public function edit($id)
    {
        $examen = Examen::findOrFail($id);
        $profesores = Profesore::all();
        $materias = Materia::all();
        $alumnos = Alumno::all();
        return view('alumnoview.examen.edit', compact('examen', 'profesores', 'materias', 'alumnos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profesor_id' => 'required',
            'materia_id' => 'required',
            'alumno_id' => 'required',
            'CURP' => 'required|string|max:18',
            'matricula' => 'required|string|max:10',
            'examen_estatus' => 'required|string',
            'examen_tipo' => 'required|string',
        ]);

        $examen = Examen::findOrFail($id);
        $examen->update($request->all());

        return redirect()->route('examen.index')->with('success', 'Examen actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();

        return redirect()->route('examen.index')->with('success', 'Examen eliminado exitosamente.');
    }
}