<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_task;

class ProjectTaskController extends Controller
{
    public function showTask(Project $project)
    {
        // Aquí pasa el proyecto a la vista para mostrar los comentario
        return view('show-task', compact('project'));
    }
    public function createTask(Project $project)
    {
        // Aquí pasa el proyecto a la vista para crear los comentarios
        return view('create-task', compact('project'));
    }
    public function storeTask(Request $request, Project $project)
    {
        $request->validate([
            'task_name' => 'required|string|max:255'
        ]);

        $task = new Project_task([
            'task_name' => $request->input('task_name'),
            'project_id' => $project->id, // Assign the correct project_id from the $project model
        ]);

        // Asociar la tarea con el proyecto
        $task->save();

        return redirect()->route('show-tasks', $project->id)->with('success', 'Tarea creada con éxito');
    }
}