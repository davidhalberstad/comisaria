<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLugarHecho extends Model
{
      protected $table = 'tipo_lugar_hecho';

      protected $fillable = [
          'id', 'tipo_lugar_hecho'
      ];

}
