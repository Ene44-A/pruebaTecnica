@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
    <div class="p-3">

        <div class="card">
            <div class="card-header">
                <h1>{{ $project->name }}</h1>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container">
                    <p>Descripción</p>
                    <p>{{ $project->description }}</p>
                </div>
                <a href="{{ route('create-task', $project->id) }}" class="btn btn-primary">Crear Nueva Tarea</a>
                <ul>
                    @foreach ($project->tasks as $task)
                        <li>
                            <div class="card">

                                <div class="card-header">
                                    {{ $task->task_name }}
                                </div>
                                <div class="card-body">
                                    hola pepe
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
