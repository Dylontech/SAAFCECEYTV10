<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancieroSolicitudesController extends Controller
{
    public function index()
    {
        return view('financierosolicitudes.index');
    }
    public function reporte()
    {
        return view('financierosolicitudes.reporte');
    }
}
