<?php

use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UserController;
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

//trae los datos de los proyectos guardados
Route::get('/home',[ProjectsController::class, 'index'])->name('home');


Route::get('/project', [App\Http\Controllers\HomeController::class, 'project'])->name('projects');
// enviar datos a la db
Route::post('/project', [ProjectsController::class, 'store'])->name('projects');
//datos lideres
// Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');

//tareas
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task');



//metodo para editar el proyecto
Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('projects-show');

Route::patch('/project/{id}', [ProjectsController::class, 'update'])->name('projects-update');
//ruta al metodo para eliminar
Route::delete('/project/{id}', [ProjectsController::class, 'destroy'])->name('projects-destroy');

//añadir y mirar comentarios
Route::get('/projects/{project}/show-task', [ProjectTaskController::class, 'showTask'])->name('show-task');
Route::get('/projects/{project}/create-task', [ProjectTaskController::class, 'createTask'])->name('create-task');
Route::post('/projects/{id}/store-task', [ProjectTaskController::class, 'storeTask'])->name('store-task');

//vista de usuarios
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
//crear, editar y eliminar usuarios
Route::get('admin/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::post('/home', [UserController::class, 'store'])->name('usersStore');
// Ruta para mostrar el formulario de edición de un usuario (edit)
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('edit');

// Ruta para actualizar los datos de un usuario en la base de datos (update)
Route::patch('/admin/users/{user}', [UserController::class, 'update'])->name('update');

// Ruta para eliminar un usuario de la base de datos (destroy)
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');