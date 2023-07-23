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
                    <h1>hola pepe</h1>
            </div>
        </div>

    </div>
@endsection
