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
                    <h1>Comentarios del Proyecto:</h1>
                    <ul>
                        {{-- @foreach ($comments as $comment)
                            <li>{{ $comment->comment }}</li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
