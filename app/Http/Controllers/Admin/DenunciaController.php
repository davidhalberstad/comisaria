<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon; //Editor de fecha

use App\Denuncias;
use App\PreventivoJudicial;
use App\Localidad;
use App\TipoInculpado;
use App\TipoSexo;
use App\TipoRangoEdad;
use App\TipoLugarHecho;
use App\TipoVia;
use App\Circunscripcion;
use App\Juzgado;
use App\Hecho;
use App\ModusOperandy;
use App\OrigenInstruccion;
use App\TipoVinculoImputadoVictima;
use App\TipoSemaforo;
use App\TipoModoSiniestroVial;
use App\TipoCondicionClimatica;
use App\TipoClaseVictimaVial;
use App\TipoVehiculoVictima;
use App\TipoArma;
use App\TipoOcasionHomicidio;
use App\TipoPersona;
use App\TipoSuicidio;
use App\TipoSiNo;
use App\VehiculoRobado;


class DenunciaController extends Controller
{

//Index
    public function index()
    {
        $denuncias = Denuncias::all();
        $localidades = Localidad::orderBy('municipio', 'ASC')->get();


       return view('admin.denuncias.index')->with(compact('denuncias', 'localidades'));
    }

    public function store(Request $request)
    {
        $rules = [
            // 'name' => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed'
        ];

        $messages = [
            // 'name.required' => 'Es necesario ingresar un nombre de Usuario.',
            // 'email' => 'Es necesario ingresar un E-mail',
            // 'password' => 'Es nesario ingresar una Clave'
        ];

        $this->validate($request, $rules, $messages);
        $denuncia = new Denuncias();
        // Denuncia Corta Online
        $denuncia->apellido = $request->input('apellido');
        $denuncia->nombre = $request->input('nombre');
        $denuncia->tipo_dni = $request->input('tipo_dni');
        $denuncia->nro_documento = $request->input('nro_documento');
        $denuncia->edad = $request->input('edad');
        $denuncia->sexo = $request->input('sexo');
        $denuncia->domicilio = $request->input('domicilio');
        $denuncia->telefono_fijo = $request->input('telefono_fijo');
        $denuncia->telefono_celular = $request->input('telefono_celular');
        $denuncia->correo_electronico = $request->input('correo_electronico');
        $denuncia->damnificado_testigo = $request->input('damnificado_testigo');
        $denuncia->fecha_denuncia = $request->input('fecha_denuncia');
        $denuncia->hora_denuncia = $request->input('hora_denuncia');
        $denuncia->ubicacion = $request->input('ubicacion');
        $denuncia->localidad = $request->input('localidad');
        $denuncia->tipo_hecho = $request->input('tipo_hecho');
        $denuncia->direccion_gps = $request->input('direccion_gps');
        $denuncia->relato = $request->input('relato');
        $denuncia->latitud = $request->input('latitud');
        $denuncia->longitud = $request->input('longitud');
        $denuncia->estado = 0;

        $denuncia->save();

        // Denuncia Completa Dependencia
        $preventivo_judicial = new PreventivoJudicial();

        $preventivo_judicial->inculpado = $request->input('inculpado');

        $preventivo_judicial->save();



        return back()->with('notification', 'Guardado Exitosamente!!!');
    }

//Edit
    public function edit($id)
    {

        $denuncia = Denuncias::findOrFail($id);
        $localidades = Localidad::all();
        $tipo_inculpado = TipoInculpado::orderBy('tipo', 'ASC')->get();
        $sexo = TipoSexo::orderBy('tipo', 'ASC')->get();
        $tipo_rango_edad = TipoRangoEdad::orderBy('tipo', 'ASC')->get();
        $tipo_lugar_hecho = TipoLugarHecho::orderBy('tipo_lugar_hecho', 'ASC')->get();
        $tipo_via = TipoVia::orderBy('tipo', 'ASC')->get();
        $categorias = Circunscripcion::orderBy('opcion', 'ASC')->get();
        $hechos = Hecho::orderBy('delito', 'ASC')->get();
        $modusoperandys = ModusOperandy::orderBy('modus_operandi', 'ASC')->get();
        $origen_instruccions = OrigenInstruccion::orderBy('tipo', 'ASC')->get();
        $tipo_vinculo = TipoVinculoImputadoVictima::orderBy('id', 'ASC')->get();
        $tipo_semaforo = TipoSemaforo::orderBy('id', 'ASC')->get();
        $tipo_muerte_vial = TipoModoSiniestroVial::orderBy('id', 'ASC')->get();
        $tipo_condicion_climatica = TipoCondicionClimatica::orderBy('id', 'ASC')->get();
        $tipo_clase_victima_vial = TipoClaseVictimaVial::orderBy('id', 'ASC')->get();
        $tipo_vehiculo_victima = TipoVehiculoVictima::orderBy('id', 'ASC')->get();
        $tipo_arma = TipoArma::orderBy('id', 'ASC')->get();
        $tipo_ocasion_homicidio = TipoOcasionHomicidio::orderBy('id', 'ASC')->get();
        $tipo_persona = TipoPersona::orderBy('id', 'ASC')->get();
        $tipo_suicidio = TipoSuicidio::orderBy('id', 'ASC')->get();
        $tipo_si_no = TipoSiNo::orderBy('id', 'ASC')->get();


        return view('admin.denuncias.edit')->with(compact('denuncia', 'localidades', 'tipo_inculpado', 'sexo', 'tipo_rango_edad', 'tipo_lugar_hecho', 'tipo_via', 'categorias', 'hechos', 'modusoperandys', 'origen_instruccions', 'tipo_vinculo', 'tipo_semaforo', 'tipo_muerte_vial', 'tipo_condicion_climatica', 'tipo_clase_victima_vial', 'tipo_vehiculo_victima', 'tipo_arma', 'tipo_ocasion_homicidio', 'tipo_persona', 'tipo_suicidio', 'tipo_si_no'));
    }

//Update
    public function update($id, Request $request)
    {

        $rules = [
            // 'name' => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed'
        ];

        $messages = [
            // 'name.required' => 'Es necesario ingresar un nombre de Usuario.',
            // 'email' => 'Es necesario ingresar un E-mail',
            // 'password' => 'Es nesario ingresar una Clave'
        ];

        $this->validate($request, $rules, $messages);

        $denuncia = Denuncias::findOrFail($id);

        $denuncia->apellido = $request->input('apellido');
        $denuncia->nombre = $request->input('nombre');
        $denuncia->tipo_dni = $request->input('tipo_dni');
        $denuncia->nro_documento = $request->input('nro_documento');
        $denuncia->edad = $request->input('edad');
        $denuncia->sexo = $request->input('sexo');
        $denuncia->domicilio = $request->input('domicilio');
        $denuncia->telefono_fijo = $request->input('telefono_fijo');
        $denuncia->telefono_celular = $request->input('telefono_celular');
        $denuncia->correo_electronico = $request->input('correo_electronico');
        $denuncia->damnificado_testigo = $request->input('damnificado_testigo');
        $denuncia->fecha_denuncia = $request->input('fecha_denuncia');
        $denuncia->hora_denuncia = $request->input('hora_denuncia');
        $denuncia->ubicacion = $request->input('ubicacion');
        $denuncia->localidad = $request->input('localidad');
        $denuncia->tipo_hecho = $request->input('tipo_hecho');
        $denuncia->direccion_gps = $request->input('direccion_gps');
        $denuncia->relato = $request->input('relato');
        $denuncia->latitud = $request->input('latitud');
        $denuncia->longitud = $request->input('longitud');
        $denuncia->estado = 0;

        $denuncia->save();

        // Denuncia Completa Dependencia
        $preventivo_judicial = new PreventivoJudicial();

        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->sexo_inculpado = $request->input('sexo_inculpado');
        $preventivo_judicial->edad_inculpado = $request->input('edad_inculpado');
        $preventivo_judicial->lugar_hecho = $request->input('lugar_hecho');
        $preventivo_judicial->tipo_lugar_hecho = $request->input('tipo_lugar_hecho');
        $preventivo_judicial->tipo_via_lugar_hecho = $request->input('tipo_via_lugar_hecho');
        $preventivo_judicial->calle_lugar_hecho = $request->input('calle_lugar_hecho');
        $preventivo_judicial->altura_lugar_hecho = $request->input('altura_lugar_hecho');
        $preventivo_judicial->interseccion_lugar_hecho = $request->input('interseccion_lugar_hecho');
        $preventivo_judicial->nro_casa_lugar_hecho = $request->input('nro_casa_lugar_hecho');
        $preventivo_judicial->circunscripcion_judicial = $request->input('circunscripcion_judicial');
        $preventivo_judicial->juzgado = $request->input('juzgado');
        $preventivo_judicial->hecho = $request->input('hecho');
        $preventivo_judicial->modus_operandi_fk = $request->input('modus_operandi_fk');
        $preventivo_judicial->motivo_origina_instruccion_causa = $request->input('motivo_origina_instruccion_causa');
        $preventivo_judicial->sexo_victima = $request->input('sexo_victima');
        $preventivo_judicial->vinculo_imputado_victima = $request->input('vinculo_imputado_victima');
        $preventivo_judicial->semaforo_muerte_vial = $request->input('semaforo_muerte_vial');
        $preventivo_judicial->modo_muerte_vial = $request->input('modo_muerte_vial');
        $preventivo_judicial->condicion_climatica_muerte_vial = $request->input('condicion_climatica_muerte_vial');
        $preventivo_judicial->clase_victima_muerte_vial = $request->input('clase_victima_muerte_vial');
        $preventivo_judicial->vehiculo_victima_muerte_vial = $request->input('vehiculo_victima_muerte_vial');
        $preventivo_judicial->arma_utilizada_homicidos_dolosos = $request->input('arma_utilizada_homicidos_dolosos');
        $preventivo_judicial->ocasion_delito_homicidos_dolosos = $request->input('ocasion_delito_homicidos_dolosos');
        $preventivo_judicial->sexo_homicidos_dolosos = $request->input('sexo_homicidos_dolosos');
        $preventivo_judicial->clase_victima_homicidos_dolosos = $request->input('clase_victima_homicidos_dolosos');
        $preventivo_judicial->vinculo_imputado_con_victima_homicidos_dolosos = $request->input('vinculo_imputado_con_victima_homicidos_dolosos');
        $preventivo_judicial->modalidad_suicidios = $request->input('modalidad_suicidios');
        $preventivo_judicial->sexo_suicida_suicidios = $request->input('sexo_suicida_suicidios');
        $preventivo_judicial->edad_suicida = $request->input('edad_suicida');
        $preventivo_judicial->sexo_testigo_suicidios = $request->input('sexo_testigo_suicidios');
        $preventivo_judicial->edad_testigo_suicidios = $request->input('edad_testigo_suicidios');
        $preventivo_judicial->esclarecido = $request->input('esclarecido');
        $preventivo_judicial->recupero_sustraido = $request->input('recupero_sustraido');
        $preventivo_judicial->detenido = $request->input('detenido');
        $preventivo_judicial->cantidad_detenidos = $request->input('cantidad_detenidos');
        $preventivo_judicial->detenido_masculino = $request->input('detenido_masculino');
        $preventivo_judicial->detenido_femenino = $request->input('detenido_femenino');
        $preventivo_judicial->detenido_menor_18 = $request->input('detenido_menor_18');
        $preventivo_judicial->detenido_mayor_18 = $request->input('detenido_mayor_18');
        $preventivo_judicial->latitud = $request->input('latitud');
        $preventivo_judicial->longitud = $request->input('longitud');

        //edito el formato de la fecha
        $date = Carbon::now();
        $preventivo_judicial->fecha_carga = $date;

        //Inserto datos de Vehiculos robados
        $vehiculo_robado = new VehiculoRobado();

        if($request->input('hecho') == 'HURTO MOTOCICLETA')
        {
          $vehiculo_robado->dominio = $request->input('nro').$request->input('letra');
        }
        elseif($request->input('hecho') == 'HURTO AUTOMOTOR')
        {
          $vehiculo_robado->dominio = $request->input('letra').$request->input('nro');
        }

        $vehiculo_robado->datos_vehiculo = $request->input('marca');
        $vehiculo_robado->motor = $request->input('motor');
        $vehiculo_robado->chasis = $request->input('chasis');


        $preventivo_judicial->save();


        if($request->input('hecho') == 'HURTO MOTOCICLETA' || $request->input('hecho') == 'HURTO AUTOMOTOR' )
        {
          $vehiculo_robado->save();
        }


        return back()->with('notification', 'Modificado Exitosamente!!!');
    }

//Delete
    public function delete($id)
    {
        $denuncia = Denuncias::find($id);
        $denuncia->delete();

        return back()->with('notification', 'Eliminado Exitosamente!!!');
    }


}
