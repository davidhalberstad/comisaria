<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculoVictima extends Model
{
      protected $table = 'tipo_vehiculo_victima';

      protected $fillable = [
          'id', 'tipo'
      ];

}
