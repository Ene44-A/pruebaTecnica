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


                        <h1>Lista de Usuarios</h1>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <!-- Agrega más columnas para mostrar más información si es necesario -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @role('Admin')
                                            <td><a href="" class="btn btn-info btn-sm">editar</a></td>
                                            <td><a href="" class="btn btn-danger btn-sm">Eliminar</a></td>
                                        @endrole
                                        <!-- Agrega más columnas si estás mostrando más información -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
@endsection
