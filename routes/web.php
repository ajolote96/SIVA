<?php

use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\DiaFeriadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\VacacionesAgendadasController;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\PorcentajeEmpleadoController;
use App\Http\Controllers\ShowVacacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/inicio', function () {
    return view('inicio.index');
});

Route::get('/capacitacion', function () {
    return view('Capacitacion.index');
});

Route::get('/', function () {
    return view('welcome');
});

//Route::get()

//Rutas para la eleaboracion de periodos
Route::get('/periodo', [PeriodoController::class, 'index']);
Route::post('/periodo', [PeriodoController::class, 'store'])->name('periodo.store');


//Rutas para las solicitudes
Route::get('/solicitud', [SolicitudController::class, 'index']);
Route::post('/solicitud', [SolicitudController::class, 'store'])->name('solicitud.store');

//Ruta para los dias feriados
Route::get('diaferiado', [DiaFeriadoController::class, 'index'])->middleware('can:diaferiado')->name('diaferiado.index');

Route::post('diaferiado', [DiaFeriadoController::class, 'store'])->middleware('can:diaferiado')->name('diaferiado.store');

Route::resource('diaferiado', DiaFeriadoController::class)->middleware('can:diaferiado');


Route::resource('vacaciones', VacacionesController::class);
Route::get('vacaciones', [VacacionesController::class, 'index'])->middleware('can:vacaciones')->name('vacaciones.index');  
Route::post('vacaciones/{id}', [VacacionesController::class, 'update'])->middleware('can:vacaciones')->name('vacaciones.update');
Route::post('vacaciones/{id}', [VacacionesController::class, 'destroy'])->middleware('can:vacaciones')->name('vacaciones.destroy'); 
//Route::post('vacaciones/{id}', [VacacionesController::class, 'edit'])->name('vacaciones.index');

Route::resource('show', ShowVacacionesController::class);
Route::get('show', [ShowVacacionesController::class, 'index'])->middleware('can:vacaciones')->name('show.index'); 
Route::post('show/{id}', [ShowVacacionesController::class, 'update'])->middleware('can:vacaciones')->name('show.update');
Route::post('show/{id}', [ShowVacacionesController::class, 'destroy'])->middleware('can:vacaciones')->name('show.destroy'); 

//Ruta para informacion de vaciones por usuario
Route::resource('vacacionesAgendadas', VacacionesAgendadasController::class);
Route::get('/vacacionesAgendadas', [ VacacionesAgendadasController::class, 'index']);

//Ruta para obtener el porcentaje de empleados de vacaciones
Route::resource('porcentajeEmpleado', PorcentajeEmpleadoController::class);
//Route::get('/porcentajeEmpleado', [ PorcentajeEmpleadoController::class, 'index']);

//Ruta para el generar excel
Route::get('formato', [ExportController::class, 'index'])->middleware('can:formato');
Route::get('formato/excel', [SolicitudController::class, 'export'])->middleware('can:formato')->name('formato.export');

/*Route::get('/usuario', function () {
    return view('usuario.index');
});

Route::get('/usuario/create', [EmpleadoController::class,'create']);
*/

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('capacitacion', CapacitacionController::class)->middleware('auth');
Route::resource('direccion', DireccionController::class)->middleware('auth');
Route::resource('solicitud', SolicitudController::class)->middleware('auth');
Route::resource('vacacionesAgendadas', VacacionesAgendadasController::class)->middleware('auth');
Auth::routes();

//Route::group(['middleware'=>['auth']],function(){
 //   Route::resource('vacacionesAgendadas', VacacionesAgendadasController::class);
//});
// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']],function(){
Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
Route::post('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/calendarioEmpleado', [App\Http\Controllers\CalendarioEmpleadoController::class, 'index']);
    Route::post('/calendarioEmpleado/mostrar', [App\Http\Controllers\CalendarioEmpleadoController::class, 'show']);
    Route::post('/calendarioEmpleado/agregar', [App\Http\Controllers\CalendarioEmpleadoController::class, 'store']);
    Route::post('/calendarioEmpleado/editar/{id}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'edit']);
    Route::post('/calendarioEmpleado/actualizar/{calendarioEmpleado}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'update']);
    Route::post('/calendarioEmpleado/borrar/{id}', [App\Http\Controllers\CalendarioEmpleadoController::class, 'destroy']);
    });



    Route::group(['middleware'=>['auth']],function(){
        Route::get('/calendarioPermiso', [App\Http\Controllers\CalendarioPermisoController::class, 'index']);
        Route::post('/calendarioPermiso/mostrar', [App\Http\Controllers\CalendarioPermisoController::class, 'show']);
        Route::post('/calendarioPermiso/agregar', [App\Http\Controllers\CalendarioPermisoController::class, 'store']);
        Route::post('/calendarioPermiso/editar/{id}', [App\Http\Controllers\CalendarioPermisoController::class, 'edit']);
        Route::post('/calendarioPermiso/actualizar/{calendarioPermisos}', [App\Http\Controllers\CalendarioPermisoController::class, 'update']);
        Route::post('/calendarioPermiso/borrar/{id}', [App\Http\Controllers\CalendarioPermisoController::class, 'destroy']);
        });

        Route::group(['middleware'=>['auth']],function(){
        Route::get('/departamentoJefe',[App\Http\Controllers\DepartamentoJefeController::class,'index']);
        });

Route::post('login',function(){
    $credentials = request()->only('email','password');

    $remember = request()->filled('remember');

    if (Auth::attempt($credentials,$remember)){
        request()->session()->regenerate();

        return redirect('inicio');
    }
    return redirect('inicio');
});

// Route::get('/evento',function (){
// $posts = ['cris','omar','ernesto'];
// return view ('evento/index',compact('posts'));
// });

Auth::routes();