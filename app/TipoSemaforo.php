<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSemaforo extends Model
{
      protected $table = 'tipo_semaforo';

      protected $fillable = [
          'id', 'tipo'
      ];

}
