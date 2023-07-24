<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('principal');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//trae los datos de los proyectos guardados
Route::get('/home',[ProjectsController::class, 'index'])->name('home');


Route::get('/project', [App\Http\Controllers\HomeController::class, 'project'])->name('projects');
// enviar datos a la db
Route::post('/project', [ProjectsController::class, 'store'])->name('projects');


//tareas
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task');



//metodo para editar el proyecto
Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('projects-show');

Route::patch('/project/{id}', [ProjectsController::class, 'update'])->name('projects-update');
//ruta al metodo para eliminar
Route::delete('/project/{id}', [ProjectsController::class, 'destroy'])->name('projects-destroy');

//vista de usuarios
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

