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
                  <label for="apellido">Apellido</label>
                  <input type="apellido" name="apellido" class="form-control" value="{{ $denuncia->apellido }}">
              </div>

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{ $denuncia->nombre }}">
              </div>
<!--
              <div class="form-group">
                  <label for="tipo_dni">Tipo Documento </label>
                  <input type="number" name="tipo_dni" class="form-control" value="{{ $denuncia->tipo_dni }}">
              </div> -->

              <div class="form-group">
                  <label for="nro_documento">DNI </label>
                  <input type="text" name="nro_documento" class="form-control" value="{{ $denuncia->nro_documento }}">
              </div>

              <div class="form-group">
                  <label for="edad">Edad </label>
                  <input type="number" name="edad" class="form-control" value="{{ $denuncia->edad }}">
              </div>

              <div class="form-group">
                  <label for="sexo">Sexo </label>
                  <input type="text" name="sexo" class="form-control" value="{{ $denuncia->sexo }}">
              </div>

              <div class="form-group">
                  <label for="domicilio">Domicilio </label>
                  <input type="text" name="domicilio" class="form-control" value="{{ $denuncia->domicilio }}">
              </div>

              <div class="form-group">
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
              </div>

              <div class="form-group">
                  <label for="damnificado_testigo">Damnificado/Testigos </label>
                  <input type="text" name="damnificado_testigo" class="form-control" value="{{ $denuncia->damnificado_testigo }}">
              </div>

              <div class="form-group">
                  <label for="fecha_denuncia">Fecha Denuncia </label>
                  <input type="date" name="fecha_denuncia" class="form-control" value="{{ $denuncia->fecha_denuncia }}">
              </div>

              <div class="form-group">
                  <label for="hora_denuncia">Hora Denuncia </label>
                  <input type="time" name="hora_denuncia" class="form-control" value="{{ $denuncia->hora_denuncia }}">
              </div>

              <div class="form-group">
                  <label for="ubicacion">Ubicacion </label>
                  <input type="text" name="ubicacion" class="form-control" value="{{ $denuncia->ubicacion }}">
              </div>

              <div class="form-group" >
                  <label for="localidad">Localidad </label>
                  <select name="localidad" class="form-control js-example-basic-single" >
                      @foreach( $localidades as $category )
                      <option value="{{ $category->id }}" @if($denuncia->localidad=== $category->id) selected='selected' @endif>{{ $category->municipio }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="tipo_hecho">Tipo de Hecho a Denunciar </label>
                  <select name="tipo_hecho" class="form-control" >
                      @foreach( $tipo_hecho as $category )
                      <option value="{{ $category->id }}" @if($denuncia->tipo_hecho=== $category->id) selected='selected' @endif>{{ $category->tipo }}</option>
                      @endforeach
                  </select>
            </div>

              <div class="form-group">
                  <label for="relato">Relato </label>
                  <textarea name="relato" id="relato" rows="10" cols="128">{{ $denuncia->relato }}</textarea>
              </div>

              <!-- <div class="form-group">
            <label for="direccion_gps">Direccion GPS  </label>
                <input type="text" name="direccion_gps" class="form-control" value="{{ $denuncia->direccion_gps }}">
          </div>
-->
          <div class="form-group">
            <!-- <label for="latitud">Latitud  </label> -->
                <input type="hidden" name="latitud" class="form-control" value="{{ $denuncia->latitud }}">
          </div>

          <div class="form-group">
            <!-- <label for="longitud">Longitud  </label> -->
                <input type="hidden" name="longitud" class="form-control" value="{{ $denuncia->longitud }}">
          </div>

          <!-- <div class="form-group">
            <label for="estado">Estado  </label>
                <input type="text" name="estado" class="form-control" value="{{ $denuncia->estado }}">
          </div>  -->

              <!-- Comienza la carga de complementacion de la denuncia -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*COMPLEMENTAR LA DENUNCIA* </h3>
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
                  <label for="inculpado">Tipo Inculpado </label>
                  <select name="inculpado" class="form-control">
                      @foreach( $tipo_inculpado as $category )
                      <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="sexo_inculpado">Sexo Inculpado </label>
                  <select name="sexo_inculpado" class="form-control" required>
                      <option selected value="NO CONSTA">NO CONSTA</option>
                      @foreach( $sexo as $category )
                      <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="edad_inculpado">Edad Inculpado </label>
                  <select name="edad_inculpado" class="form-control" required>
                      <option selected value="NO CONSTA">NO CONSTA</option>
                      @foreach( $tipo_rango_edad as $category )
                      <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="lugar_hecho">LUGAR DEL HECHO </label>
                  <input type="text" name="lugar_hecho" class="form-control" value="{{ $denuncia->lugar_hecho }}">
              </div>

              <div class="form-group">
                  <label for="tipo_lugar_hecho">TIPO LUGAR DEL HECHO </label>
                  <select name="tipo_lugar_hecho" class="form-control" required>
                      <option selected value="">Seleccionar</option>
                      @foreach( $tipo_lugar_hecho as $item )
                      <option value="{{ $item->tipo_lugar_hecho }}">{{ $item->tipo_lugar_hecho }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="tipo_via_lugar_hecho">TIPO VIA: </label>
                  <select name="tipo_via_lugar_hecho" class="form-control" required>
                      <option selected value="">Seleccionar</option>
                      @foreach( $tipo_via as $category )
                      <option value="{{ $category->tipo }}">{{ $category->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="calle_lugar_hecho">CALLE </label>
                  <input type="text" name="calle_lugar_hecho" class="form-control" value="{{ $denuncia->calle_lugar_hecho }}">
              </div>

              <div class="form-group">
                  <label for="altura_lugar_hecho">ALTURA </label>
                  <input type="text" name="altura_lugar_hecho" class="form-control" value="{{ $denuncia->altura_lugar_hecho }}">
              </div>

              <div class="form-group">
                  <label for="interseccion_lugar_hecho">Intersección </label>
                  <input type="text" name="interseccion_lugar_hecho" class="form-control" value="{{ $denuncia->interseccion_lugar_hecho }}">
              </div>

              <div class="form-group">
                  <label for="nro_casa_lugar_hecho">Casa Nro. </label>
                  <input type="text" name="nro_casa_lugar_hecho" class="form-control" value="{{ $denuncia->nro_casa_lugar_hecho }}">
              </div>

              <!-- Select Padre -->
              <div class="form-group">
                  <label for="" class="control-label">Seleccione CIRCUNSCRIPCION JUDICIAL</label>
                  <select name="circunscripcion_judicial" id="circunscripcion_judicial" class="form-control" required >
                      <option value="">Seleccione</option>
                      @foreach ($circunscripcion as $item)
                      <option value="{{ $item->id }}">{{ $item->opcion }}</option>
                      @endforeach
                  </select>
              </div>

        <!-- Select Hijo Nivel 1 -->
              <div class="form-group">
                  <label for="" class="control-label">Seleccione JUZGADO</label>
                  <select name="juzgado" id="juzgado" class="form-control" required>
                    <option value="">Seleccione</option>
                  </select>
              </div>

        <!-- Select Hijo Nivel 2 -->
              <div class="form-group">
                  <label for="" class="control-label">Seleccione SECRETARIA</label>
                  <select name="secretaria" id="secretaria" class="form-control" required>
                  </select>
              </div>

              <div class="form-group">
                  <label for="hecho" class="control-label">HECHO</label>
                  <select name="hecho" class="form-control js-example-basic-single" required>
                      <option value="">Seleccione</option>
                      @foreach ($hechos as $item)
                      <option value="{{ $item->delito }}">{{ $item->delito }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="modus_operandi_fk" class="control-label">MODUS OPERANDI</label>
                  <select name="modus_operandi_fk" class="form-control js-example-basic-single" required>
                      <option value="">Seleccione</option>
                      @foreach ($modusoperandys as $item)
                      <option value="{{ $item->id }}">{{ $item->modus_operandi }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="motivo_origina_instruccion_causa" class="control-label">MOTIVO QUE ORIGINA LA INSTR. DE LA CAUSA</label>
                  <select name="motivo_origina_instruccion_causa" class="form-control" required>
                      <option value="">Seleccione</option>
                      @foreach ($origen_instruccions as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="sexo_victima" class="control-label">SEXO VICTIMA</label>
                  <select name="sexo_victima" class="form-control" required>
                      <option selected value="NO CONSTA">NO CONSTA</option>
                      @foreach ($sexo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="vinculo_imputado_victima" class="control-label">VINCULO INCULPADO CON LA VICTIMA</label>
                  <select name="vinculo_imputado_victima" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_vinculo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <!-- Comienza la carga de complementacion de la denuncia: COMPLETAR EN CASO DE MUERTES VIALES -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*COMPLETAR EN CASO DE MUERTES VIALES* </h3>
              </div>

              <div class="form-group">
                  <label for="semaforo_muerte_vial" class="control-label">SEMAFORO</label>
                  <select name="semaforo_muerte_vial" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_semaforo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="modo_muerte_vial" class="control-label">MODO</label>
                  <select name="modo_muerte_vial" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_muerte_vial as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="condicion_climatica_muerte_vial" class="control-label">CONDICION CLIMATICA</label>
                  <select name="condicion_climatica_muerte_vial" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_condicion_climatica as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="clase_victima_muerte_vial" class="control-label">CLASE VICTIMA</label>
                  <select name="clase_victima_muerte_vial" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_clase_victima_vial as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="vehiculo_victima_muerte_vial" class="control-label">VEHICULO VICTIMA</label>
                  <select name="vehiculo_victima_muerte_vial" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_vehiculo_victima as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <!-- Comienza la carga de complementacion de la denuncia: COMPLETAR EN CASO DE HOMICIDIOS DOLOSOS -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*COMPLETAR EN CASO DE HOMICIDIOS DOLOSOS* </h3>
              </div>

              <div class="form-group">
                  <label for="arma_utilizada_homicidos_dolosos" class="control-label">ARMA UTILIZADA</label>
                  <select name="arma_utilizada_homicidos_dolosos" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_arma as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="ocasion_delito_homicidos_dolosos" class="control-label">OCASION</label>
                  <select name="ocasion_delito_homicidos_dolosos" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_ocasion_homicidio as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="sexo_homicidos_dolosos" class="control-label">SEXO</label>
                  <select name="sexo_homicidos_dolosos" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      <option value="99 - SIN DETERMINACION">99 - SIN DETERMINACION</option>
                      @foreach ($sexo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="clase_victima_homicidos_dolosos" class="control-label">CLASE VICTIMA</label>
                  <select name="clase_victima_homicidos_dolosos" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_persona as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="vinculo_imputado_con_victima_homicidos_dolosos" class="control-label">VINCULO DEL INCULPADO CON LA VICTIMA</label>
                  <select name="vinculo_imputado_con_victima_homicidos_dolosos" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_vinculo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <!-- Comienza la carga de complementacion de la denuncia: COMPLETAR EN CASO DE SUICIDIOS -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*COMPLETAR EN CASO DE SUICIDIOS* </h3>
              </div>

              <div class="form-group">
                  <label for="modalidad_suicidios" class="control-label">MODALIDAD DEL SUICIDIO</label>
                  <select name="modalidad_suicidios" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_suicidio as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="sexo_suicida_suicidios" class="control-label">SEXO DEL SUICIDA</label>
                  <select name="sexo_suicida_suicidios" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      <option value="99 - SIN DETERMINAR">99 - SIN DETERMINAR</option>
                      @foreach ($sexo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="edad_suicida">EDAD SUICIDA </label>
                  <input type="number" name="edad_suicida" class="form-control" value="{{ $denuncia->edad_suicida }}">
              </div>

              <div class="form-group">
                  <label for="sexo_testigo_suicidios" class="control-label">SEXO TESTIGO</label>
                  <select name="sexo_testigo_suicidios" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      <option value="99 - SIN DETERMINAR">99 - SIN DETERMINAR</option>
                      @foreach ($sexo as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="edad_testigo_suicidios">EDAD TESTIGO </label>
                  <input type="number" name="edad_testigo_suicidios" class="form-control" value="{{ $denuncia->edad_suicida }}">
              </div>

              <!-- Comienza la carga de complementacion de la denuncia: Cargar solo en caso de HURTO DE MOTICICLETA O AUTOMOTOR -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*Cargar solo en caso de HURTO DE MOTICICLETA O AUTOMOTOR* </h3>
              </div>

              <div class="form-group">
                  <label for="letra">LETRA DOMINIO</label>
                  <input type="text" name="letra" class="form-control" value="{{ $denuncia->letra }}">
              </div>

              <div class="form-group">
                  <label for="nro">NRO DOMINO</label>
                  <input type="text" name="nro" class="form-control" value="{{ $denuncia->nro }}">
              </div>

              <div class="form-group">
                  <label for="marca">MARCA Y MODELO</label>
                  <input type="text" name="marca" class="form-control" value="{{ $denuncia->marca }}">
              </div>

              <div class="form-group">
                  <label for="motor">NRO MOTOR</label>
                  <input type="text" name="motor" class="form-control" value="{{ $denuncia->motor }}">
              </div>

              <div class="form-group">
                  <label for="chasis">NRO CHASIS O CUADRO</label>
                  <input type="text" name="chasis" class="form-control" value="{{ $denuncia->chasis }}">
              </div>

              <!-- Comienza la carga de complementacion de la denuncia: Esclarecido y Detenidos -->
              <hr> </hr>
              <div class="form-group">
                  <h3>*ESCLARECIMIENTO Y DETENIDOS* </h3>
              </div>

              <div class="form-group">
                  <label for="esclarecido" class="control-label">ESCLARECIDO</label>
                  <select name="esclarecido" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_si_no as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="recupero_sustraido" class="control-label">SE RECUPERO LO SUSTRAIDO</label>
                  <select name="recupero_sustraido" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_si_no as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="detenido" class="control-label">DETENIDO</label>
                  <select name="detenido" class="form-control" required>
                      <option selected value="">Seleccione</option>
                      @foreach ($tipo_si_no as $item)
                      <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="cantidad_detenidos">CANTIDAD DE DETENIDOS</label>
                  <input type="number" name="cantidad_detenidos" class="form-control" value="{{ $denuncia->cantidad_detenidos }}">
              </div>

              <div class="form-group">
                  <label for="detenido_masculino">CANTIDAD DE DETENIDOS MASCULINOS</label>
                  <input type="number" name="detenido_masculino" class="form-control" value="{{ $denuncia->detenido_masculino }}">
              </div>

              <div class="form-group">
                  <label for="detenido_femenino">CANTIDAD DE DETENIDOS FEMENINOS</label>
                  <input type="number" name="detenido_femenino" class="form-control" value="{{ $denuncia->detenido_femenino }}">
              </div>

              <div class="form-group">
                  <label for="detenido_menor_18">CANTIDAD DE DETENIDOS MASCULINOS MENORES A 18 AÑOS</label>
                  <input type="number" name="detenido_menor_18" class="form-control" value="{{ $denuncia->detenido_menor_18 }}">
              </div>

              <div class="form-group">
                  <label for="detenido_mayor_18">CANTIDAD DE DETENIDOS MASCULINOS MAYORES A 18 AÑOS</label>
                  <input type="number" name="detenido_mayor_18" class="form-control" value="{{ $denuncia->detenido_mayor_18 }}">
              </div>

<!-- mapa -->
            <p>
              <a class="btn btn-light" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Visualizar el punto en el Mapa</a>
            </p>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="form-group">
                      @map([
                            'lat' => $denuncia->latitud,
                            'lng' =>  $denuncia->longitud,
                            'zoom' => 14,
                            'markers' => [
                            [
                                'title' => $denuncia->tipo_hecho,
                                'lat' => $denuncia->latitud,
                                'lng' =>  $denuncia->longitud,
                                'popup' => $denuncia->relato,
                                'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                                'icon_size' => [20, 32],
                                'icon_anchor' => [0, 32],
                            ],
                          ],
                        ])
                    </div>
                  </div>
                </div>
            </div>
<!-- fin mapa -->

            <!-- Comienza la Asignacion del numero de Prenventivo -->
            <hr> </hr>
            <div class="form-group">
                <h3>*ASIGNAR NUMERO DE PREVENTIVO JUDICIAL* </h3>
            </div>

            <div class="form-group">
                <label for="nro_preventivo">Nro Preventivo </label>
                <input type="text" name="nro_preventivo" class="form-control" value="{{ $denuncia->nro_preventivo }}" required >
            </div>

            <div class="form-group">
                <label for="anio_preventivo">Año del Preventivo </label>
                <input type="number" name="anio_preventivo" min="2018" max="2050" class="form-control" value="{{ $denuncia->anio_preventivo }}" required >
            </div>

            <div class="form-group">
                <label for="fecha_preventivo">Fecha del Preventivo </label>
                <input type="date" name="fecha_preventivo" class="form-control" value="{{ $preventivo_judicial->fecha_preventivo }}">
            </div>


              <!-- Boton Modificar -->
              <br />
              <div class="form-group">
                  <button class="btn btn-primary">Modificar</button>
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
