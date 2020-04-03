<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCondicionClimatica extends Model
{
      protected $table = 'tipo_condicion_climatica';

      protected $fillable = [
          'id', 'tipo'
      ];

}
