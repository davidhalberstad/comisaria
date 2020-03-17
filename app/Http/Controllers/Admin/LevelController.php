<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function byProject($id)
    {
       return Level::where('project_id', $id)->get();
    } 
    
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Es necesario ingresar al Nombre del Nivel.'
            ]);

            Level::create($request->all());

    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Es necesario ingresar al Nombre de la Categria.'
            ]);

            $level_id = $request->input('level_id');
            $level = Level::find($level_id);
            $level->name = $request->input('name');
            $level->save();

            return back();
    }

    public function delete($id)
    {
       
            Level::find($id)->delete();
            
            return back();
    }
}
