<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edición
     */

     //controlador de guardado de proyectos

    public function store(Request $request){
        $request -> validate([
            'title' => 'required|min:3',
        ]);
    }
}
