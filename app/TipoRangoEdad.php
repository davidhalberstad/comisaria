<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRangoEdad extends Model
{
      protected $table = 'tipo_rango_edad';

      protected $fillable = [
          'id', 'tipo'
      ];

}
