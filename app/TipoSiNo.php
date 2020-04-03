<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSiNo extends Model
{
      protected $table = 'tipo_si_no';

      protected $fillable = [
          'id', 'tipo'
      ];

}
