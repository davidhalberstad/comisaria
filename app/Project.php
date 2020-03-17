<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;

    public static $rules = [
        // 'name' => 'required|max:255',
        // 'email' => 'required|email|max:255|unique:Projects',
        // 'password' => 'required|min:6|confirmed'
    ];

    public static $messages = [
        // 'name.required' => 'Es necesario ingresar un nombre de Usuario.',
        // 'email' => 'Es necesario ingresar un E-mail',
        // 'password' => 'Es nesario ingresar una Clave'
    ];

    protected $fillable  = [
        'name', 'description', 'start' 
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }
}
