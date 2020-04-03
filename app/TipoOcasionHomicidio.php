<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOcasionHomicidio extends Model
{
      protected $table = 'tipo_ocasion_homicidio';

      protected $fillable = [
          'id', 'tipo'
      ];

}
