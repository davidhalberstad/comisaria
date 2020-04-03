<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoClaseVictimaVial extends Model
{
      protected $table = 'tipo_clase_victima_vial';

      protected $fillable = [
          'id', 'tipo'
      ];

}
