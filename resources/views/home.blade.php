@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Apellido</th>
                    <th>Nombres</th>
                    <th>Documento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($denuncias as $denuncia)
                <tr>
                    <td>{{ $denuncia->apellido }}</td>
                    <td>{{ $denuncia->nombre }}</td>
                    <td>{{ $denuncia->nro_documento }}</td>
                    <td>
                        <a href="denuncia/{{ $denuncia->id }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="denuncia/{{ $denuncia->id }}/eliminar" class="btn btn-sm  btn-danger">Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
