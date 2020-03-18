<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
      protected $table = 'misiones';

      protected $fillable = [
          'municipio', 'departamento', 'poblacion', 'mujeres', 'varones', 'zona',
      ];

}
