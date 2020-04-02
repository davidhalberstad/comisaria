<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
      protected $table = 'select_2';

      protected $fillable = [
          'id', 'opcion', 'relacion',
      ];

}
