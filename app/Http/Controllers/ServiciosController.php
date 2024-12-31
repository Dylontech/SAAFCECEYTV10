<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create()
    {
        return view('services');
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'services' => 'required|array',
            'services.*' => 'string'
        ]);

        // Obtener los servicios seleccionados
        $selectedServices = $request->input('services');

        // Aquí puedes procesar los servicios seleccionados como lo necesites
        // Por ejemplo, guardarlos en la base de datos, enviar un correo, etc.

        return redirect()->route('services.create')->with('success', 'Servicios solicitados correctamente.');
    }
}
