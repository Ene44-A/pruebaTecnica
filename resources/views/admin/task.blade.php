@extends('adminlte::page')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
                {{-- @if (count($projects) > 0)
                    
                @else --}}
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <h1>Ey! No hay tareas por mostrar.</h1>
                                <img src="{{ asset('assets/home.jpg') }}" width="510" alt="">
                            </div>
                        </div>
                    </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endsection
