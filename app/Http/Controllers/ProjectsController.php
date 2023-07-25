<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectsController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edición
     */

    //mostrar los projectos del home
    public function index()
    {
        // $projects = Project::all();
        // return view('home', ['projects' => $projects]);

        $projects = Project::with('leader')->get();
        return view('home', ['projects' => $projects]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.show', ['project' => $project]);
    }

    //traer id de liders
    protected $fillable = ['leader_id'];

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }
    //controlador de guardado de proyectos

    public function store(Request $request)
    {
        //toma y validación de datos
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'color' => 'required',
            'alias' => 'required|min:3',
            'status' => 'required',
            'leader_user' => 'required',
            'initial_date' => 'required',
            'final_date' => 'required'
        ]);

        //guardado de datos de los proyectos
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->color = $request->color;
        $project->alias = $request->alias;
        $project->status = $request->status;
        $project->leader_user = $request->leader_user;
        $project->initial_date = $request->initial_date;
        $project->final_date = $request->final_date;
        $project->save();

        //redirecion para movimiento de datos
        // return view('projects', ['users' => $users])->with('success', 'Proyecto registrado correctamente');
        return redirect()->route('projects')->with('success', 'Projecto registrado correctamente');

    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->color = $request->color;
        $project->alias = $request->alias;
        $project->status = $request->status;
        $project->leader_user = $request->leader_user;
        $project->initial_date = $request->initial_date;
        $project->final_date = $request->final_date;
        $project->save();

        $users = User::all(); // Obtener todos los usuarios

        // return view('projects', ['users' => $users])->with('success', 'Proyecto actualizado');
        return redirect()->route('home')->with('success', 'Proyecto actualizado');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects')->with('success', 'Proyecto eliminado');
    }


}