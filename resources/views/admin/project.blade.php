@extends('adminlte::page')

@section('content')
    <div class="p-3">

        <div class="card">
            <div class="card-header">{{ __('Proyecto') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container">
                    <form action="{{ route('projects') }}" method="POST">
                        @csrf
                        {{-- valida que fue guardado el proyecto --}}
                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        {{-- mensaje de error --}}
                        @error('name')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('color')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('alias')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('description')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('leader_user')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('initial_date')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        @error('final_date')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror


                        <label for="Titulo" class="form-label">Nompre del proyecto</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Titulo" required>
                        <div class="input-group">
                            <div class="col-md-2">
                                <label for="exampleColorInput" class="form-label">Color</label>
                            </div>
                            <label for="Titulo" class="form-label">alias</label>
                        </div>
                        <div class="input-group">
                            <div class="col-md-2">
                                <input type="color" name="color" class="form-control form-control-color"
                                    id="exampleColorInput" value="#563d7c" title="color" required>
                            </div>
                            <input type="text" name="alias" class="form-control" id="exampleFormControlInput1"
                                placeholder="alias" required>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" style="max-height: 200px;" id="exampleFormControlTextarea1"
                                rows="3" required></textarea>
                        </div>
                        <label for="exampleFormControlTextarea1" class="form-label">Pilar de proyecto</label>
                        <div class="input-group">
                            <span class="input-group-text">Lider de proyecto</span>
                            <select class="form-select" name="leader_user" aria-label="Default select example">
                                <option selected >Seleccionar</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            {{-- <span class="input-group-text">Estado del proyecto</span> --}}
                            <select class="form-select" name="status" aria-label="Default select example" style="display: none;" readonly>
                                <option  value="pendiente" selected>Pendiente</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="finalizada">Finalizada</option>
                            </select>
                        </div>
                        <label for="exampleFormControlTextarea1" class="form-label">Fechas del proyecto</label>
                        <div class="input-group">
                            <span class="input-group-text">Tiempo del proyecto</span>
                            <input type="date" name="initial_date" aria-label="First name" class="form-control" required>
                            <input type="date" name="final_date" aria-label="Last name" class="form-control" required>
                        </div>
                        <div id="emailHelp" class="form-text">Por favor verificar todos los datos correctamentes</div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
