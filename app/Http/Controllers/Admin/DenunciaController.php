<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Denuncias;
use App\Localidad;

class DenunciaController extends Controller
{

//Index
    public function index()
    {
        $denuncias = Denuncias::all();
        $localidades = Localidad::all();

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
        $denuncia->nro_documento = $request->input('nro_documento');
        $denuncia->fecha_denuncia = $request->input('fecha_denuncia');
        $denuncia->hora_denuncia = $request->input('hora_denuncia');
        $denuncia->ubicacion = $request->input('ubicacion');
        $denuncia->localidad = $request->input('localidad');
        $denuncia->tipo_hecho = $request->input('tipo_hecho');
        $denuncia->relato = $request->input('relato');
        $denuncia->direccion_gps = $request->input('direccion_gps');
        $denuncia->relato = $request->input('relato');
        $denuncia->latitud = $request->input('latitud');
        $denuncia->longitud = $request->input('longitud');
        $denuncia->estado = 0;

        // Denuncia Completa Dependencia


        $denuncia->save();

        // dd($request->all());

        return back()->with('notification', 'Guardado Exitosamente!!!');
    }

//Edit
    public function edit($id)
    {
        $denuncia = Denuncias::find($id);
        $localidades = Localidad::all();

        return view('admin.denuncias.edit')->with(compact('denuncia', 'localidades'));
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

        $denuncia = Denuncias::find($id);

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
        $denuncia->nro_documento = $request->input('nro_documento');
        $denuncia->fecha_denuncia = $request->input('fecha_denuncia');
        $denuncia->hora_denuncia = $request->input('hora_denuncia');
        $denuncia->ubicacion = $request->input('ubicacion');
        $denuncia->localidad = $request->input('localidad');
        $denuncia->tipo_hecho = $request->input('tipo_hecho');
        $denuncia->relato = $request->input('relato');
        $denuncia->direccion_gps = $request->input('direccion_gps');
        $denuncia->relato = $request->input('relato');
        $denuncia->latitud = $request->input('latitud');
        $denuncia->longitud = $request->input('longitud');
        $denuncia->estado = 0;

        $denuncia->save();

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
