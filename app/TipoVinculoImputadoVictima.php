<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVinculoImputadoVictima extends Model
{
      protected $table = 'tipo_vinculo_imputado_victima';

      protected $fillable = [
          'id', 'tipo'
      ];

}
