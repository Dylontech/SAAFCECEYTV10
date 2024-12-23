<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/alumno', App\Http\Controllers\AlumnoController::class);

Route::get('login', [LoginController::class, 'showLoginform'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');


Route::get('altausuarios', [UsuarioController::class, 'showAltaUsuariosForm'])->name('altausuarios');
Route::post('altausuarios', [UsuarioController::class, 'altaUsuarios']);


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/asignar-roles', [RoleController::class, 'showAssignRolesForm'])->name('asignar.roles.form');
Route::post('/asignar-roles', [RoleController::class, 'assignRole'])->name('asignar.roles');