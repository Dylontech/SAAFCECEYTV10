<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Profesore;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function create()
    {
        $profesores = Profesore::all();
        $materias = Materia::all();

        return view('alumnoview.examen.index', compact('profesores', 'materias'));
    }

    public function getMateriasByProfesor(Request $request)
    {
        $profesorId = $request->get('profesor_id');
        $materias = Materia::where('Materia_profesor', $profesorId)->get();
        return response()->json($materias);
    }

    public function getProfesoresByMateria(Request $request)
    {
        $materiaId = $request->get('materia_id');
        $profesorId = Materia::where('id', $materiaId)->pluck('Materia_profesor')->first();
        $profesor = Profesore::find($profesorId);
        return response()->json($profesor);
    }
}