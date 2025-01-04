<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Profesore;
use App\Models\Materia;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamenController extends Controller
{
    public function create()
    {
        $profesores = Profesore::all();
        $materias = Materia::all();
        $alumnos = Alumno::all();

        return view('alumnoview.examen.index', compact('profesores', 'materias', 'alumnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profesor' => 'required',
            'materia' => 'required',
            'alumno' => 'required',
            'CURP' => 'required|string|max:18',
            'matricula' => 'required|string|max:10',
            'examen_estatus' => 'required|string',
            'examen_tipo' => 'required|array',
        ]);

        $examen = Examen::create([
            'profesor' => $request->input('profesor'),
            'materia' => $request->input('materia'),
            'alumno' => Auth::user()->name,
            'CURP' => $request->input('CURP'),
            'matricula' => $request->input('matricula'),
            'examen_estatus' => 'pendiente_validar_examen',
            'examen_tipo' => implode(',', $request->input('examen_tipo')),
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
            'profesor' => 'required',
            'materia' => 'required',
            'alumno' => 'required',
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