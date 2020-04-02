<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVia extends Model
{
      protected $table = 'tipo_via';

      protected $fillable = [
          'id', 'tipo'
      ];

}
