@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Proyectos</div>
    
    <div class="panel-body">
            @if(session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
      </div>

       cd

    <div class="card-body">
        <form action="" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
            <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
            <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>

            <div class="form-group">
            <label for="start">Fecha de Inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date('Y-m-d')) }}">
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Registrar Proyecto</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha de Inicio</th>
                    <th>Opciones</th>
                </tr>
            </thead> 
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'No se ha indicado fecha de Inicio'  }}</td>
                   
                    <td>
                             
                        @if($project->trashed())
                            <a href="proyecto/{{ $project->id }}/restaurar" class="btn btn-sm  btn-danger">Restaurar</a>
                        @else
                            <a href="proyecto/{{ $project->id }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="proyecto/{{ $project->id }}/eliminar" class="btn btn-sm  btn-danger">Dar de Baja</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>       

    </div>
</div>
@endsection
