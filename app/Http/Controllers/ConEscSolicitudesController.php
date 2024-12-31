<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConEscSolicitudesController extends Controller
{
    public function index()
    {
        return view('ConEscSolicitudes.index');
    }
}
