@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('content')
    <div class="p-3">

        <div class="card">
            <div class="card-header">{{ __('Home') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($projects) > 0)
                    @foreach ($projects->sortByDesc('created_at') as $project)
                        <div class="card m-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h4>
                                            <span class="badge"style="background:{{ $project->color }} ;">#</span>
                                            <strong>Proyecto: </strong> {{ $project->name }}
                                        </h4>
                                        <br>
                                        <p class="blockquote-footer">{{ $project->alias }}</p>
                                        <p class="">{{ $project->leader_user }}</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-right">{{ $project->status }}</p>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Inicio</span>
                                        <input type="text" class="form-control" readonly
                                            value="{{ $project->initial_date }}" aria-label="Username">
                                        <span class="input-group-text">Final</span>
                                        <input type="text" class="form-control" readonly
                                            value="{{ $project->final_date }}" aria-label="Server">
                                    </div>
                                    <p>{{ $project->description }}</p>
                                </div>
                            </div>
                            @role('admin')
                                <div class="card-body">
                                    <div class="row py-1">
                                        <div class="col-md-9 d-flex aling-items-center">
                                            <a href="{{ route('projects-show', ['id' => $project->id]) }}">Editar</a>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-end">
                                            <form action="{{ route('projects-destroy', ['id' => $project->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endrole
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $project->name }}</li>
                            </ul>
                        </div>
                    @endforeach
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <h1>No hay proyectos para mostrar.</h1>
                                <img src="{{ asset('assets/task.jpg') }}" width="510" alt="">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
