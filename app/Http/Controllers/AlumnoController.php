<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::paginate(10);

        return view('alumno.index', compact('alumnos'))
            ->with('i', (request()->input('page', 1) - 1) * $alumnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        return view('alumno.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alumno::$rules);

        $alumno = Alumno::create($request->all());

        // Crear usuario
        Usuarios::create([
            'name' => $alumno->Nombre,
            'User_name' => $alumno->Matricula,
            'User_tipo' => 'alumno',
            'User_pass' => Hash::make($alumno->CURP),
            'role_id' => 4,
        ]);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        request()->validate(Alumno::$rules);

        $data = $request->all();
        $data['Grupo'] = $data['Semestre'] . $data['Grupo'];

        $alumno->update($data);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id)->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno deleted successfully');
    }
    public function reinscripcion($id)
{
    $alumno = Alumno::find($id);

    return view('alumnoview.reinscripcion.index', compact('alumno'));
}
    public function constancia($id)
    {
        $alumno = Alumno::find($id);

        return view('alumnoview.constancia.index', compact('alumno'));
    }
public function examen($id)
    {
        $alumno = Alumno::find($id);

        return view('alumnoview.examen.index', compact('alumno'));
    }
}
