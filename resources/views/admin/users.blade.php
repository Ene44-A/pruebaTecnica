@extends('adminlte::page')

@section('content')
    <div class="p-3">

        <div class="card">
            <div class="card-header">{{ __('Lista de Usuarios') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="container">
                    <h1>Lista de Usuarios</h1>
                    @role('Admin')
                        <a href="{{ route('create') }}" class="btn btn-primary">Crear Usuario</a>
                    @endrole
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                @if ($user->id !== 1)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @role('Admin')
                                            <td class="d-flex justify-content-end">
                                                <a href="{{ route('edit', $user->id) }}"
                                                    class="btn  btn-sm btn-primary">Editar</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn ml-2 btn-sm btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        @endrole
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4">No hay usuarios registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
