@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Denuncias</div>

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

<!-- Comienza el formulario de Denuncia Corta Online -->
              <div class="form-group">
                <label for="apellido">Apellido</label>
                    <input type="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}">
              </div>

              <div class="form-group">
                <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
              </div>

              <div class="form-group">
                <label for="tipo_dni">Tipo DNI  </label>
                    <input type="text" name="tipo_dni" class="form-control" value="{{ old('tipo_dni') }}">
              </div>

              <div class="form-group">
                <label for="nro_documento">DNI  </label>
                    <input type="text" name="nro_documento" class="form-control" value="{{ old('nro_documento') }}">
              </div>

              <div class="form-group">
                <label for="edad">Edad  </label>
                    <input type="text" name="edad" class="form-control" value="{{ old('edad') }}">
              </div>

              <div class="form-group">
                <label for="sexo">Sexo  </label>
                    <input type="text" name="sexo" class="form-control" value="{{ old('sexo') }}">
              </div>

              <div class="form-group">
                <label for="domicilio">Domicilio  </label>
                    <input type="text" name="domicilio" class="form-control" value="{{ old('domicilio') }}">
              </div>

              <div class="form-group">
                <label for="telefono_celular">Telefono Celular  </label>
                    <input type="text" name="telefono_celular" class="form-control" value="{{ old('telefono_celular') }}">
              </div>

              <div class="form-group">
                <label for="telefono_fijo">Telefono Fijo  </label>
                <input type="text" name="telefono_fijo" class="form-control" value="{{ old('telefono_fijo') }}">
              </div>

              <div class="form-group">
                <label for="correo_electronico">Correo Electronico  </label>
                    <input type="text" name="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}">
              </div>

              <div class="form-group">
                <label for="damnificado_testigo">Damnificado/Testigos  </label>
                    <input type="text" name="damnificado_testigo" class="form-control" value="{{ old('damnificado_testigo') }}">
              </div>

              <div class="form-group">
                <label for="fecha_denuncia">Fecha Denuncia </label>
                    <input type="date" name="fecha_denuncia" class="form-control" value="{{ old('fecha_denuncia') }}">
              </div>

              <div class="form-group">
                <label for="hora_denuncia">Hora Denuncia  </label>
                    <input type="time" name="hora_denuncia" class="form-control" value="{{ old('hora_denuncia') }}">
              </div>

              <div class="form-group">
                <label for="ubicacion">Ubicacion  </label>
                    <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}">
              </div>

              <div class="form-group">
                  <label for="localidad">Localidad  </label>
                    <select name="localidad" class="form-control">
                      @foreach( $localidades as $category )
                       <option value="{{ $category->id }}">{{ $category->municipio }}</option>
                      @endforeach
                    </select>
              </div>

             <div class="form-group">
                <label for="tipo_hecho">Tipo de Hecho a Denunciar  </label>
                    <input type="integer" name="tipo_hecho" class="form-control" value="{{ old('tipo_hecho') }}">
              </div>

              <div class="form-group">
                <label for="relato">Relato  </label>
                <textarea name="relato" id="relato" rows="5" cols="100">{{ old('relato') }}</textarea>
              </div>

              <div class="form-group">
                <label for="direccion_gps">Direccion GPS  </label>
                    <input type="text" name="direccion_gps" class="form-control" value="{{ old('direccion_gps') }}">
              </div>

              <div class="form-group">
                <label for="latitud">Latitud  </label>
                    <input type="text" name="latitud" class="form-control" value="{{ old('latitud') }}">
              </div>

              <div class="form-group">
                <label for="longitud">Longitud  </label>
                    <input type="text" name="longitud" class="form-control" value="{{ old('longitud') }}">
              </div>

              <div class="form-group">
                <label for="estado">Estado  </label>
                    <input type="text" name="estado" class="form-control" value="{{ old('estado') }}">
              </div>

<!-- Comienza el formulario de Denuncia Completa -->

            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>

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
