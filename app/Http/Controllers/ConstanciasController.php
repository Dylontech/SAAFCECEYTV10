<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constancia;
use Illuminate\Support\Facades\Auth;


class ConstanciasController extends Controller
{
  public function index()
  {
    return view('alumnoview', compact('alumnos'));
}
  public function constancias()
    {
        // Your logic here
        return view('alumnoview.constancia.index');
    }
    public function create()
    {
      return view('alumnoview', compact('alumnos'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'nombre' => 'required',
          'CURP' => 'required|string|max:18',
          'matricula' => 'required|string|max:10',
          'constancia_tipo' => 'required|array',
      ]);

      $constancia = new Constancia();
      $constancia->nombre = Auth::user()->name;
      $constancia->CURP = $request->input('CURP');
      $constancia->matricula = $request->input('matricula');
      $constancia->constancia_tipo = implode(',', $request->input('constancia_tipo'));
      $constancia->constancia_estatus = 'pendiente_validar_constancia';
      $constancia->save();

      return redirect()->route('alumnoview')->with('success', 'Reinscripcion creado exitosamente.');
  }

    public function show($id)
    {
        // Your logic here
    }
    public function edit($id)
    {
        // Your logic here
    }
    public function update(Request $request, $id)
    {
        // Your logic here
    }
    public function destroy($id)
    {
        // Your logic here
    }
}
