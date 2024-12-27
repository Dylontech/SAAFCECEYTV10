<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminview'); // Asegúrate de que el nombre del middleware esté correcto
    }
    public function index()
    {
        return view('AdminView'); // Asegúrate de que la vista exista y esté correctamente nombrada
    }
}
