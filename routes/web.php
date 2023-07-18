<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\ReporteController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aqui es donde se registran las rutas web de la aplicacion. Estas rutas
| son cargadas por el RouteServiceProvider en un grupo el cual contenga el
| grupo middleware "web
*/

Route::get('/', HomeController::class ) ->name('home');                                                         # Estas son las rutas donde se puede acceder sin necesidad
Route::get('/auth/logindocente', [LoginController::class, 'login_docente']) ->name('auth.login_docente');       # de haber iniciado sesion en la aplicacion
Route::get('/auth/loginacudiente', [LoginController::class, 'login_acudiente']) ->name('auth.login_acudiente');
Route::get('/auth/loginadmin', [LoginController::class, 'login_admin']) ->name('auth.login_admin');
Route::post('/auth/check_docente', [LoginController::class, 'check_docente']) ->name('auth.check_docente');
Route::post('/auth/check_acudiente', [LoginController::class, 'check_acudiente']) ->name('auth.check_acudiente');        
Route::post('/auth/check_admin', [LoginController::class, 'check_admin']) ->name('auth.check_admin');                   
Route::get('/auth/logout',[LoginController::class, 'logout'])->name('auth.logout');
Route::get('/actividades/download/{file}', [ActividadController::class, 'download'])->name('actividades.download');
Route::get('actividades/entrega/descargar/{entrega}', [EntregaController::class, 'download'])->name('entrega.download');

Route::group(['middleware'=>['AuthCheck']],function(){                          # Estas son las rutas que requieren tener una verificacion de inicio
                                                                                # de sesion para garantizar el acceso ya sea de docentes o acudientes

    Route::get('/anuncios/show/{curso}',[AnuncioController::class,'show'])->name('anuncios.show.curso');
    Route::get('/anuncios/create/{curso}',[AnuncioController::class,'create'])->name('anuncios.create');
    Route::post('/anuncios/store/{curso}',[AnuncioController::class, 'store'])->name('anuncios.store');
    Route::get('/anuncios/destroy/{anuncio}/{curso}',[AnuncioController::class,'destroy'])->name('anuncios.destroy');

    Route::get('/actividades/show/{curso}', [ActividadController::class, 'show'])->name('actividades.show');
    Route::get('/actividades/ver/{curso}/{id}', [ActividadController::class, 'ver'])->name('actividades.ver');
    Route::get('/actividades/create/{curso}', [ActividadController::class, 'create'])->name('actividades.create');      
    Route::post('/actividades/store/{curso}', [ActividadController::class, 'store'])->name('actividades.store');        
    Route::get('/actividades/destroy/{curso}/{actividad}', [ActividadController::class, 'destroy'])->name('actividades.destroy');
    

    Route::get('/actividades/entrega/create/{curso}/{id}', [EntregaController::class, 'create'])->name('actividades.entrega.create');
    Route::post('/actividades/store/{curso}/{id}', [EntregaController::class, 'store'])->name('actividades.entrega.store');
    Route::get('/actividades/entrega/show/{curso}/{id}', [EntregaController::class, 'show'])->name('actividades.entrega.show');
    Route::put('actividades/entrega/calificar/{entrega}', [EntregaController::class, 'calificar'])->name('actividades.entrega.calificar');
    Route::get('/acudientes/preview',[AcudienteController::class,'show_estudiantes'])->name('acudientes.preview');

    Route::get('/notas/{curso}', [ReporteController::class, 'show_acudiente'])->name('reporte.show.acudiente');
    Route::get('/notas/{curso}/docente', [ReporteController::class, 'show_docentes'])->name('reporte.show.docentes');
    Route::get('/notas/{curso}/descargar/docente', [ReporteController::class, 'generatePDFdocente'])->name('reporte.generate.docente');
    Route::get('/notas/{curso}/descargar/acudiente', [ReporteController::class, 'generatePDFacudiente'])->name('reporte.generate.acudiente');

});



Route::group(['middleware'=>['AuthCheckAdmin']], function(){    # Estas son las rutas que requieren tener una verificacion de inicio de sesion de tipo administrador
                                                                # para garantizar el acceso
    Route::view('/admin', 'admin.register')->name('admin');     
    Route::get('/admin/acudientes', [AdminController::class, 'show_acudientes' ]) ->name('show.acudientes');
    Route::get('/admin/docentes', [AdminController::class, 'show_docentes' ]) ->name('show.docentes');
    Route::get('/admin/register_docente', [AdminController::class, 'register_docente' ]) ->name('admin.register_docente');
    Route::get('/admin/register_acudiente', [AdminController::class, 'register_acudiente' ]) ->name('admin.register_acudiente');
    Route::post('/admin/save_docente', [AdminController::class, 'save_docente']) ->name('admin.save_docente');
    Route::post('/admin/save_acudiente', [AdminController::class, 'save_acudiente']) ->name('admin.save_acudiente');
    Route::get('/admin/edit_acudiente/{acudiente}', [AdminController::class, 'edit_acudiente' ]) ->name('admin.edit_acudiente');
    Route::put('/admin/acudientes/{acudiente}', [AdminController::class, 'update_acudiente' ]) ->name('admin.update_acudiente');
    Route::delete('/admin/acudientes/{acudiente}', [AdminController::class, 'destroy_acudiente' ]) ->name('admin.destroy_acudiente');
    Route::get('/admin/edit_docente/{docente}', [AdminController::class, 'edit_docente' ]) ->name('admin.edit_docente');
    Route::put('/admin/docentes/{docente}', [AdminController::class, 'update_docente' ]) ->name('admin.update_docente');         
    Route::delete('/admin/docentes/{docente}', [AdminController::class, 'destroy_docente' ]) ->name('admin.destroy_docente');

    Route::get('/admin/estudiantes', [AdminController::class, 'show_estudiantes' ]) ->name('show.estudiantes');
    Route::get('/admin/register_estudiante', [AdminController::class, 'register_estudiante' ]) ->name('admin.register_estudiante');
    Route::post('/admin/save_estudiante', [AdminController::class, 'save_estudiante']) ->name('admin.save_estudiante');
    Route::get('/admin/edit_estudiantes/{estudiante}', [AdminController::class, 'edit_estudiante' ]) ->name('admin.edit_estudiante');
    Route::put('/admin/estudiantes/{estuadiante}', [AdminController::class, 'update_estudiante' ]) ->name('admin.update_estudiante');
    Route::delete('/admin/estudiantes/{estudiante}', [AdminController::class, 'destroy_estudiante' ]) ->name('admin.destroy_estudiante');

});