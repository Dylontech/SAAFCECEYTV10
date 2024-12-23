<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlEscolarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('control_escolar');
    }

    public function index()
    {
        return view('control_escolar');
    }
}