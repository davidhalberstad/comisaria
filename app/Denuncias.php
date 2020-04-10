<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncias extends Model
{
  protected $table = 'denuncias_online';

  protected $fillable = [
      'apellido', 'nombre', 'nro_documento'
  ];

  public function tipohecho()
  {
      return $this->hasMany('App\TipoHecho');
  }

}
