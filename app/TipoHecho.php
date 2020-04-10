<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHecho extends Model
{
      protected $table = 'tipo_delito';

      protected $fillable = [
          'id', 'tipo'
      ];

      public function denuncias()
      {
          return $this->belongsTo('App\Denuncias');
      }
}
