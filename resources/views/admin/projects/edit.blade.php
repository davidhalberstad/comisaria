@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Editar Proyecto</div>
    
    <div class="panel-body">
            @if(session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
      </div>

        <div class="panel-body">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
      </div>

    <div class="card-body">
        <form action="" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
            <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
            </div>

            <div class="form-group">
            <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $project->description) }}">
            </div>

            <div class="form-group">
            <label for="start">Fecha de Inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $project->start) }}">
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Guardar Proyecto</button>
            </div>
        </form>

        <div class="row">
            <p> Categorias </p>
            <form action="/categorias" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Ingresar Nombre" class="form-control">
                </div>
                <div class="form-group">
                <button class="btn btn-primary">Añadir</button>
                </div>
            </form>

            <div class="col-md-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                                                    
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-category="{{ $category->id }}">Editar</button>
                                <a href="categoria/{{ $category->id }}/eliminar" class="btn btn-sm  btn-danger">Dar de Baja</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
            </div>

            <div class="col-md-5">
                <p> Niveles </p>
                <form action="/niveles" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingresar Nombre" class="form-control">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary">Añadir</button>
                    </div>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                    @foreach($levels as $key => $level)
                        <tr>
                            <td>N{{ $key+1 }}</td>
                            <td>{{ $level->name }}</td>
                                                    
                            <td>
                            <button type="button" class="btn btn-sm btn-primary" title="Editar" data-level="{{ $level->id }}">Editar</button>
                                <a href="nivel/{{ $level->id }}/eliminar" class="btn btn-sm  btn-danger">Dar de Baja</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
            </div>
        
        
        </div>

               

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/categoria/editar" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
                <label for="name">Nombre de la Categoria</label>
                <input type="text" class="form_control" name="name" id="category_name" value="">
            </div>
         </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar NIVEL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/nivel/editar" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
                <label for="name">Nombre del Nivel</label>
                <input type="text" class="form_control" name="name" id="level_name" value="">
            </div>
         </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection