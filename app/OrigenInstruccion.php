<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrigenInstruccion extends Model
{
      protected $table = 'tipo_origen_causa';

      protected $fillable = [
        'id', 'tipo',
      ];

}
