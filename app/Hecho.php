<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hecho extends Model
{
      protected $table = 'tipos_delitos';

      protected $fillable = [
        'delito', 'id_delitos_titulos', 'cod', 'tipo_delito', 'id'
      ];

}
