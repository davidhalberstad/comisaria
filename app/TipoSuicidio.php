<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSuicidio extends Model
{
      protected $table = 'tipo_suicidio';

      protected $fillable = [
          'id', 'tipo'
      ];

}
