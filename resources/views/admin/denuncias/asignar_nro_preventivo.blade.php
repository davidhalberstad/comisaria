@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- alertas -->
<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>

@mapstyles
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>


<div class="card">
    <div class="card-header">Asignar el Nro. de Preventivo a la Denuncia</div>

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
          <form action="asignar_nro_preventivo" method="POST">
              {{ csrf_field() }}

              <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="apellido" name="apellido" class="form-control" readonly value="{{ $denuncia->apellido }}">
              </div>

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" readonly value="{{ $denuncia->nombre }}">
              </div>
<!--
              <div class="form-group">
                  <label for="tipo_dni">Tipo Documento </label>
                  <input type="number" name="tipo_dni" class="form-control" value="{{ $denuncia->tipo_dni }}">
              </div> -->

              <div class="form-group">
                  <label for="nro_documento">DNI </label>
                  <input type="text" name="nro_documento" class="form-control" readonly value="{{ $denuncia->nro_documento }}">
              </div>

              <div class="form-group">
                  <label for="edad">Edad </label>
                  <input type="number" name="edad" class="form-control" readonly value="{{ $denuncia->edad }}">
              </div>

              <div class="form-group">
                  <label for="sexo">Sexo </label>
                  <input type="text" name="sexo" class="form-control" readonly value="{{ $denuncia->sexo }}">
              </div>

              <div class="form-group">
                  <label for="domicilio">Domicilio </label>
                  <input type="text" name="domicilio" class="form-control" readonly value="{{ $denuncia->domicilio }}">
              </div>

              <!-- <div class="form-group">
                  <label for="telefono_celular">Telefono Celular </label>
                  <input type="text" name="telefono_celular" class="form-control" value="{{ $denuncia->telefono_celular }}">
              </div>

              <div class="form-group">
                  <label for="telefono_fijo">Telefono Fijo </label>
                  <input type="text" name="telefono_fijo" class="form-control" value="{{ $denuncia->telefono_fijo }}">
              </div>

              <div class="form-group">
                  <label for="correo_electronico">Correo Electronico </label>
                  <input type="text" name="correo_electronico" class="form-control" value="{{ $denuncia->correo_electronico }}">
              </div> -->

              <!-- <div class="form-group">
                  <label for="damnificado_testigo">Damnificado/Testigos </label>
                  <input type="text" name="damnificado_testigo" class="form-control" value="{{ $denuncia->damnificado_testigo }}">
              </div> -->

              <div class="form-group">
                  <label for="fecha_denuncia">Fecha Denuncia </label>
                  <input type="date" name="fecha_denuncia" class="form-control" readonly value="{{ $denuncia->fecha_denuncia }}">
              </div>

              <div class="form-group">
                  <label for="hora_denuncia">Hora Denuncia </label>
                  <input type="time" name="hora_denuncia" class="form-control" readonly value="{{ $denuncia->hora_denuncia }}">
              </div>

              <div class="form-group">
                  <label for="relato">Relato </label>
                  <textarea  readonly name="relato" id="relato" rows="10" cols="128">{{ $denuncia->relato }}</textarea>
              </div>

              <!-- Comienza la Asignacion del numero de Prenventivo -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*ASIGNAR NUMERO DE PREVENTIVO JUDICIAL* </h3>
              </div>
              
              <div class="form-group">
                  <label for="dependencia">Tipo Inculpado </label>
                  <select name="dependencia" class="form-control js-example-basic-single" required >
                    <option value="">Seleccione</option>
                      @foreach( $dependencia as $category )
                      <option value="{{ $category->dependencia }}">{{ $category->dependencia }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="nro_preventivo">Nro Preventivo </label>
                  <input type="text" name="nro_preventivo" class="form-control" value="{{ $PreventivoJudicial->nro_preventivo }}" required >
              </div>

              <div class="form-group">
                  <label for="anio_preventivo">Año del Preventivo </label>
                  <input type="number" name="anio_preventivo" min="2018" max="2050" class="form-control" value="{{ $denuncia->anio_preventivo }}" required >
              </div>

              <!-- Boton Modificar -->
              <br />
              <div class="form-group">
                  <button class="btn btn-primary">Asignar Numero de Preventivo</button>
              </div>

          </form>

      </div>
    </div>

<!-- CUSTOM -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- alertas -->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>

<!--  SELECT 2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- SELECT 2-->
<script>
  $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });
</script>

<!-- Select Anidados -->
<script>
  $(document).ready(function(){
    $("#circunscripcion_judicial").change(function(){
      var item = $(this).val();
      $.get('/comisaria/public/productByCategory/'+item, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        console.log(data);
          var producto_select = '<option value="">Seleccione Juzgado</option>'
            for (var i=0; i<data.length;i++)
              producto_select+='<option value="'+data[i].id+'">'+data[i].opcion+'</option>';

            $("#juzgado").html(producto_select);

      });
    });
  });

  $(document).ready(function(){
    $("#juzgado").change(function(){
      var item = $(this).val();
      $.get('/comisaria/public/productBySecretaria/'+item, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        console.log(data);
          var producto_select = '<option value="">Seleccione Secretaria</option>'
            for (var i=0; i<data.length;i++)
              producto_select+='<option value="'+data[i].id+'">'+data[i].opcion+'</option>';

            $("#secretaria").html(producto_select);

      });
    });
  });
</script>

@mapscripts
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>

<script>
  window.addEventListener('LaravelMaps:MapInitialized', function (event) {
    var element = event.detail.element;
    var map = event.detail.map;
    var markers = event.detail.markers;
    var service = event.detail.service;
    console.log('map initialized', element, map, markers, service);
  });

  window.addEventListener('LaravelMaps:MarkerClicked', function (event) {
      var element = event.detail.element;
      var map = event.detail.map;
      var marker = event.detail.marker;
      var service = event.detail.service;
      console.log('marker clicked', element, map, marker, service);
  });
</script>


@endsection
