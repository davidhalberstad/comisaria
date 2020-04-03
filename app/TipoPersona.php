<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
      protected $table = 'tipo_persona';

      protected $fillable = [
          'id', 'tipo'
      ];

}
