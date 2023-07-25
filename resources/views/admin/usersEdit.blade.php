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
                    <h1>Editar Usuario</h1>
                    <form action="{{ route('update', $user->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        {{-- mensaje de error --}}
                        @error('name')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control"value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control"value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="text" name="password" id="password" class="form-control"value="{{ $user->password }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
