@extends('adminlte::page')

@section('content')
    <div class="p-3">

        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container">
                    <form>
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo">
                        <div class="input-group">
                            <div class="col-md-2">
                                <label for="exampleColorInput" class="form-label">Color</label>
                            </div>
                            <label for="Titulo" class="form-label">Titulo</label>
                        </div>
                        <div class="input-group">
                            <div class="col-md-2">
                                <input type="color" class="form-control form-control-color" id="exampleColorInput"
                                    value="#563d7c" title="color">
                            </div>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Información</label>
                            <textarea class="form-control" style="max-height: 300px;" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <label for="exampleFormControlTextarea1" class="form-label">Pilar de proyecto</label>
                        <div class="input-group">
                            <span class="input-group-text">Lider de proyecto</span>
                            {{-- <input type="text" aria-label="First name" class="form-control"> --}}
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            {{-- <input type="text" aria-label="Last name" class="form-control"> --}}
                            <span class="input-group-text">Estado del proyecto</span>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="finalizada">Finalizada</option>
                            </select>
                        </div>
                        <label for="exampleFormControlTextarea1" class="form-label">Fechas del proyecto</label>
                        <div class="input-group">
                            <span class="input-group-text">Tiempo del proyecto</span>
                            <input type="date" aria-label="First name" class="form-control">
                            <input type="date" aria-label="Last name" class="form-control">
                        </div>
                        <div id="emailHelp" class="form-text">Por favor verificar todos los datos correctamentes</div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
