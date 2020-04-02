<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSexo extends Model
{
      protected $table = 'tipo_sexo';

      protected $fillable = [
          'id', 'tipo'
      ];

}
