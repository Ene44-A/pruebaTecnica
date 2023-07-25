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
                    <h4>Crear Nueva Tarea</h4>
                    <form action="{{ route('store-task', $project->id) }}" method="POST">
                        @csrf

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        {{-- mensaje de error --}}
                        @error('task_name')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        {{-- @error('task_leader')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('task_description')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('status')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror --}}


                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre de la tarea</span>
                            <input type="text" class="form-control" placeholder="tarea" aria-label="Username"
                                aria-describedby="basic-addon1" name="task_name" id="task_name" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Lider de proyecto</span>
                            <select class="form-select" name="task_leader" aria-label="Default select example">
                                <option selected>Seleccionar</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripcion</span>
                            <textarea class="form-control" aria-label="With textarea" style="max-height: 200px;" name="task_description" id="task_description" required></textarea>
                        </div>
                        <select class="form-select" name="status" aria-label="Default select example"
                            style="display: none;" readonly>
                            <option value="pendiente" selected>Pendiente</option>
                            <option value="en_proceso">En Proceso</option>
                            <option value="finalizada">Finalizada</option>
                        </select>


                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary">Guardar Tarea</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
