<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
      protected $table = 'select_3';

      protected $fillable = [
          'id', 'opcion', 'relacion'
      ];

    
}
