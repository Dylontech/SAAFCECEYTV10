<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ControlEscolarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\ProfesoreController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AlumnoSolicitudesController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ConEscSolicitudesController;
use App\Http\Controllers\ConstanciasController;
use App\Http\Controllers\FinancieroSolicitudesController;
use App\Http\Controllers\ReinscripcionController;
use App\Models\Pendiente;
use App\Http\Controllers\PendienteController;
use App\Http\Controllers\ArchivoController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas protegidas por rol
Route::middleware(['role:admin'])->group(function () {
    Route::get('/AdminView', function () {
        return view('AdminView');
    })->name('AdminView');
    Route::get('/AdminView', [AdminViewController::class, 'index'])->name('AdminView');
    Route::get('/asignar-roles', [RoleController::class, 'showAssignRolesForm'])->name('asignar.roles.form');
    Route::post('/asignar-roles', [RoleController::class, 'assignRole'])->name('asignar.roles');
    Route::get('/alta-usuarios', [UsuarioController::class, 'showAltaUsuariosForm'])->name('altausuarios.form');
Route::post('/alta-usuarios', [UsuarioController::class, 'altaUsuarios'])->name('altausuarios');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/profesores', App\Http\Controllers\ProfesoreController::class);
    Route::resource('/materias', App\Http\Controllers\MateriaController::class);
    Route::resource('/blogs', BlogController::class);
    route::get('/blog.index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/AdminView', [BlogController::class, 'adminView'])->name('AdminView');
});

Route::middleware(['role:alumno'])->group(function () {
    Route::get('/alumnoview', function () {
        return view('alumnoview');
    })->name('AlumnoView');
    Route::get('alumnoview', [ExamenController::class, 'create'])->name('examen.create');
    Route::get('/examen', [ExamenController::class, 'index'])->name('examen.index');
    Route::post('/examen', [ExamenController::class, 'store'])->name('examen.store'); // Add this line
    Route::post('/reinscripcion', [ReinscripcionController::class, 'store'])->name('reinscripcion.store');
    Route::get('/reinscripcion', [ReinscripcionController::class, 'reinscripcion'])->name('reinscripcion.index');
    Route::get('/constancias', [ConstanciasController::class, 'constancias'])->name('constancias.index');
    Route::post('/constancias', [ConstanciasController::class, 'store'])->name('constancias.store');
    Route::resource('/blogs', BlogController::class);
    Route::get('/constancias', [ConstanciasController::class, 'constancias'])->name('constancia.index');
    Route::get('/alumnoview', [BlogController::class, 'alumnoview'])->name('alumnoview');
    Route::get('/pendiente', [PendienteController::class, 'pendiente'])->name('pendiente.index');
    Route::get('/pagos-en-tramite', [PendienteController::class, 'pagosEnTramite']);
    


Route::post('/upload/reinscripcion/{id}', [ArchivoController::class, 'uploadReinscripcion'])->name('upload.reinscripcion');
Route::get('/download/reinscripcion/{id}', [ArchivoController::class, 'downloadReinscripcion'])->name('download.reinscripcion');

Route::post('/upload/constancia/{id}', [ArchivoController::class, 'uploadConstancia'])->name('upload.constancia');
Route::get('/download/constancia/{id}', [ArchivoController::class, 'downloadConstancia'])->name('download.constancia');

Route::post('/upload/examen/{id}', [ArchivoController::class, 'uploadExamen'])->name('upload.examen');
Route::get('/download/examen/{id}', [ArchivoController::class, 'downloadExamen'])->name('download.examen');
});



// Rutas públicas
Route::get('login', [LoginController::class, 'showLoginform'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');
Route::get('altausuarios', [UsuarioController::class, 'showAltaUsuariosForm'])->name('altausuarios');
Route::post('altausuarios', [UsuarioController::class, 'altaUsuarios']);
Route::resource('/blogs', BlogController::class);
Route::get('/', [blogController::class, 'index'])->name('home');
Route::get('blog/create', [blogController::class, 'create'])->name('blog.create');
Route::post('blog', [blogController::class, 'store'])->name('blog.store');

// Rutas para alumnos
Route::resource('/alumnos', AlumnoController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/adminview', function () {
    return view('adminview');
    Route::resource('/blogs', BlogController::class);
    Route::get('/AdminView', [BlogController::class, 'adminView'])->name('AdminView');
    
});
