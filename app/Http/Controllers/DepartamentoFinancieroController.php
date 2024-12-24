<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoFinancieroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('departamento_financiero');
    }

    public function index()
    {
        return view('departamento_financiero');
    }
}