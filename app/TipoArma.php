<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoArma extends Model
{
      protected $table = 'tipo_arma';

      protected $fillable = [
          'id', 'tipo'
      ];

}
