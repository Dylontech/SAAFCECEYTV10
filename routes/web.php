<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ControlEscolarController;


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

Route::resource('/alumnos', App\Http\Controllers\AlumnoController::class);

Route::get('login', [LoginController::class, 'showLoginform'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');


Route::get('altausuarios', [UsuarioController::class, 'showAltaUsuariosForm'])->name('altausuarios');
Route::post('altausuarios', [UsuarioController::class, 'altaUsuarios']);


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/asignar-roles', [RoleController::class, 'showAssignRolesForm'])->name('asignar.roles.form');
Route::post('/asignar-roles', [RoleController::class, 'assignRole'])->name('asignar.roles');Route::resource('/usuario', App\Http\Controllers\UsuarioController::class);
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
// Rutas para asignar roles
Route::get('/asignar-roles', [RoleController::class, 'showAssignRolesForm'])->name('asignar.roles.form');
Route::post('/asignar-roles', [RoleController::class, 'assignRole'])->name('asignar.roles');

// Rutas para usuarios
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Ruta para mostrar el formulario de alta de usuarios
Route::get('/alta-usuarios', [UsuarioController::class, 'showAltaUsuariosForm'])->name('altausuarios.form');
Route::post('/alta-usuarios', [UsuarioController::class, 'altaUsuarios'])->name('altausuarios');

// Ruta para control escolar
Route::get('/control-escolar', [ControlEscolarController::class, 'index'])->name('control.escolar')->middleware('auth', 'control_escolar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/control-escolar', [App\Http\Controllers\ControlEscolarController::class, 'index'])->name('control-escolar');
Route::get('/AlumnoView', [App\Http\Controllers\AlumnoViewController::class, 'index'])->name('AlumnoView');
Route::get('/departamento-financiero', [App\Http\Controllers\DepartamentoFinancieroController::class, 'index'])->name('departamento-financiero');
Route::get('/AdminView', [App\Http\Controllers\AdminViewController::class, 'index'])->name('AdminView');
Route::resource('/profesores', App\Http\Controllers\ProfesoreController::class);
Route::resource('/materias', App\Http\Controllers\MateriaController::class);


// Rutas para alumnos

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumnosolicitudes', [App\Http\Controllers\AlumnoSolicitudesController::class, 'index'])->name('alumnosolicitudes');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
