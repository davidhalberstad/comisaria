<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculoRobado extends Model
{
      protected $table = 'vehiculos_robados';

      protected $fillable = [
                            'ur',
                            'depe',
                            'fecha date',
                            'dni',
                            'apeynom',
                            'caracteristicas_vehiculo',
                            'habido',
                            'fecha_ubicacion',
                            'localidad',
                            'lugar_habido',
                            'datos_vehiculo',
                            'tipo_rodado',
                            'dominio',
                            'chasis',
                            'motor',
                            'nro integer',
                            'anio integer',
                            'cod'
      ];


}
