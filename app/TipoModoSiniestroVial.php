<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoModoSiniestroVial extends Model
{
      protected $table = 'tipo_modo_siniestro_vial';

      protected $fillable = [
          'id', 'tipo'
      ];

}
