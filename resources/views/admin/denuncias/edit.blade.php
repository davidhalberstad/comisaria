@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Editar Denuncia</div>

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

            <div class="form-group">
              <label for="apellido">Apellido</label>
                  <input type="apellido" name="apellido" class="form-control" value="{{ $denuncia->apellido }}">
            </div>

            <div class="form-group">
              <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{ $denuncia->nombre }}">
            </div>

            <div class="form-group">
              <label for="tipo_dni">Tipo Documento  </label>
                  <input type="text" name="tipo_dni" class="form-control" value="{{ $denuncia->tipo_dni }}">
            </div>

            <div class="form-group">
              <label for="nro_documento">DNI  </label>
                  <input type="text" name="nro_documento" class="form-control" value="{{ $denuncia->nro_documento }}">
            </div>

            <div class="form-group">
              <label for="edad">Edad  </label>
                  <input type="text" name="edad" class="form-control" value="{{ $denuncia->edad }}">
            </div>

            <div class="form-group">
              <label for="sexo">Sexo  </label>
                  <input type="text" name="sexo" class="form-control" value="{{ $denuncia->sexo }}">
            </div>

            <div class="form-group">
              <label for="domicilio">Domicilio  </label>
                  <input type="text" name="domicilio" class="form-control" value="{{ $denuncia->domicilio }}">
            </div>

            <div class="form-group">
              <label for="telefono_celular">Telefono Celular  </label>
                  <input type="text" name="telefono_celular" class="form-control" value="{{ $denuncia->telefono_celular }}">
            </div>

            <div class="form-group">
              <label for="telefono_fijo">Telefono Fijo  </label>
              <input type="text" name="telefono_fijo" class="form-control" value="{{ $denuncia->telefono_fijo }}">
            </div>

            <div class="form-group">
              <label for="correo_electronico">Correo Electronico  </label>
                  <input type="text" name="correo_electronico" class="form-control" value="{{ $denuncia->correo_electronico }}">
            </div>

            <div class="form-group">
              <label for="damnificado_testigo">Damnificado/Testigos  </label>
                  <input type="text" name="damnificado_testigo" class="form-control" value="{{ $denuncia->damnificado_testigo }}">
            </div>

            <div class="form-group">
              <label for="fecha_denuncia">Fecha Denuncia </label>
                  <input type="date" name="fecha_denuncia" class="form-control" value="{{ $denuncia->fecha_denuncia }}">
            </div>

            <div class="form-group">
              <label for="hora_denuncia">Hora Denuncia  </label>
                  <input type="time" name="hora_denuncia" class="form-control" value="{{ $denuncia->hora_denuncia }}">
            </div>

            <div class="form-group">
              <label for="ubicacion">Ubicacion  </label>
                  <input type="text" name="ubicacion" class="form-control" value="{{ $denuncia->ubicacion }}">
            </div>

            <div class="form-group">
                <label for="localidad">Localidad  </label>
                  <select name="localidad" class="form-control">
                    @foreach( $localidades as $category )
                     <option value="{{ $category->id }}" @if($denuncia->localidad=== $category->id) selected='selected' @endif>{{ $category->municipio }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
              <label for="tipo_hecho">Tipo de Hecho a Denunciar  </label>
                  <input type="integer" name="tipo_hecho" class="form-control" value="{{ $denuncia->tipo_hecho }}">
            </div>

            <div class="form-group">
              <label for="relato">Relato  </label>
              <textarea name="relato" id="relato" rows="5" cols="128">{{ $denuncia->relato }}</textarea>
            </div>

            <!-- <div class="form-group">
              <label for="direccion_gps">Direccion GPS  </label>
                  <input type="text" name="direccion_gps" class="form-control" value="{{ $denuncia->direccion_gps }}">
            </div>

            <div class="form-group">
              <label for="latitud">Latitud  </label>
                  <input type="text" name="latitud" class="form-control" value="{{ $denuncia->latitud }}">
            </div>

            <div class="form-group">
              <label for="longitud">Longitud  </label>
                  <input type="text" name="longitud" class="form-control" value="{{ $denuncia->longitud }}">
            </div>

            <div class="form-group">
              <label for="estado">Estado  </label>
                  <input type="text" name="estado" class="form-control" value="{{ $denuncia->estado }}">
            </div> -->

<!-- Comienza la carga de complementacion de la denuncia -->
<hr>  </hr>
            <div class="form-group">
                <label for="localidad">Tipo Inculpado  </label>
                  <select name="localidad" class="form-control">
                    @foreach( $tipo_inculpado as $category )
                     <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label for="sexo_inculpado">Sexo Inculpado  </label>
                  <select name="sexo_inculpado" class="form-control" required >
                    <option selected value="NO CONSTA">NO CONSTA</option>
                    @foreach( $sexo_inculpado as $category )
                     <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label for="edad_inculpado">Edad Inculpado  </label>
                  <select name="edad_inculpado" class="form-control" required >
                    <option selected value="NO CONSTA">NO CONSTA</option>
                    @foreach( $tipo_rango_edad as $category )
                     <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label for="tipo_lugar_hecho">Lugar del Hecho </label>
                  <select name="tipo_lugar_hecho" class="form-control" required >
                    <option selected value="">Seleccionar</option>
                    @foreach( $tipo_lugar_hecho as $category )
                     <option value="{{ $category->tipo_lugar_hecho }}">{{ $category->tipo_lugar_hecho }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label for="tipo_via">Lugar de Via </label>
                  <select name="tipo_via" class="form-control" required >
                    <option selected value="">Seleccionar</option>
                    @foreach( $tipo_via as $category )
                     <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
              <label for="calle">Calle  </label>
                  <input type="text" name="calle" class="form-control" value="{{ $denuncia->calle }}">
            </div>

            <div class="form-group">
              <label for="altura">Altura  </label>
                  <input type="text" name="altura" class="form-control" value="{{ $denuncia->altura }}">
            </div>

            <div class="form-group">
              <label for="interserccion">Intersección  </label>
                  <input type="text" name="interseccion" class="form-control" value="{{ $denuncia->interseccion }}">
            </div>

            <div class="form-group">
              <label for="casa_nro">Casa Nro.  </label>
                  <input type="text" name="casa_nro" class="form-control" value="{{ $denuncia->casa_nro }}">
            </div>

            <!-- Select Padre -->
            <div class="form-group">
               <label for="" class="control-label">Seleccione Circunscripcion Judicial</label>
                  <select name="categorias" id="categorias" class="form-control">
                     <option value="">Seleccione</option>
                     @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->opcion }}</option>
                     @endforeach
                  </select>
            </div>

            <!-- Select Hijo Nivel 1 -->
            <div class="form-group">
               <label for="" class="control-label">Seleccione Juzgado</label>
                  <select name="productos" id="productos" class="form-control">

                       <option value="">Seleccione</option>
                   </select>
            </div>

            <div class="form-group">
               <label for="hechos" class="control-label">Hecho</label>
                  <select name="hechos" class="form-control" required >
                     <option value="">Seleccione</option>
                     @foreach ($hechos as $item)
                        <option value="{{ $item->id }}">{{ $item->delito }}</option>
                     @endforeach
                  </select>
            </div>

            <div class="form-group">
               <label for="modus_operandi" class="control-label">Modus Operandi</label>
                  <select name="modus_operandi" class="form-control" required >
                     <option value="">Seleccione</option>
                     @foreach ($modusoperandys as $item)
                        <option value="{{ $item->id }}">{{ $item->modus_operandi }}</option>
                     @endforeach
                  </select>
            </div>

            <div class="form-group">
               <label for="motivo_origina_instruccion_causa" class="control-label">
MOTIVO QUE ORIGINA LA INSTR. DE LA CAUSA</label>
                  <select name="motivo_origina_instruccion_causa" class="form-control" required>
                     <option value="">Seleccione</option>
                     @foreach ($origen_instruccions as $item)
                        <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                     @endforeach
                  </select>
            </div>

          
            <!-- Boton Modificar -->
            <div class="form-group">
                <button class="btn btn-primary">Modificar</button>
            </div>

        </form>




      </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/admin/denuncias/edit.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#categorias").change(function(){
      var categoria = $(this).val();

      $.get('/productByCategory/'+categoria, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        console.log(data);
          var producto_select = '<option value="">Seleccione Porducto</option>'
            for (var i=0; i<data.length;i++)
              producto_select+='<option value="'+data[i].id+'">'+data[i].opcion+'</option>';

            $("#productos").html(producto_select);

      });
    });
  });
    </script>
@endsection
