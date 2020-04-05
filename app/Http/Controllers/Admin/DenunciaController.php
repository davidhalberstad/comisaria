<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');
        $preventivo_judicial->inculpado = $request->input('inculpado');

        $preventivo_judicial->save();


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
