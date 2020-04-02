<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInculpado extends Model
{
      protected $table = 'tipo_inculpado';

      protected $fillable = [
          'id', 'tipo'
      ];

}
