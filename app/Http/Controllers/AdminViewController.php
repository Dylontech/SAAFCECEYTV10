<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

class AdminViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminview'); // Asegúrate de que el nombre del middleware esté correcto
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('AdminView', compact('blogs')); // Pasar los blogs a la vista
    }
}
