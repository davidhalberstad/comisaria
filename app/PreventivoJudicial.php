<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreventivoJudicial extends Model
{
  protected $table = 'preventivos_judiciales';

  protected $fillable = [
      'nro_preventivo',
      'anio_preventivo',
      'fecha_preventivo',
      'dependencia',
      'fecha_hecho',
      'circunscripcion_judicial',
      'juzgado',
      'secretaria',
      'hecho',
      'extracto_preventivo',
      'estado',
      'esclarecido',
      'titulos_delitos',
      'direccion',
      'edad',
      'condicion_accidente',
      'tipo_muerte',
      'tipo_via',
      'sexo',
      'hora_accidente',
      'tipo_accidente',
      'lugar_hecho',
      'detenido',
      'denunciante',
      'tipo_doc',
      'nro_doc',
      'sospechosos',
      'id_dependencia',
      'id_delito',
      'localidad',
      'cod_delitos',
      'fecha_carga',
      'latitud',
      'longitud',
      'id_preventivos',
      'tipo_delito',
      'modus_operandi_fk',
      'cantidad_detenidos',
      'detenido_masculino',
      'detenido_femenino',
      'detenido_menor_18',
      'detenido_mayor_18',
      'horario_hecho',
      'tipo_lugar_hecho',
      'inculpado',
      'sexo_inculpado',
      'edad_inculpado',
      'tipo_via_lugar_hecho',
      'calle_lugar_hecho',
      'altura_lugar_hecho',
      'interseccion_lugar_hecho',
      'nro_casa_lugar_hecho',
      'motivo_origina_instruccion_causa',
      'sexo_victima',
      'vinculo_imputado_victima',
      'semaforo_muerte_vial',
      'modo_muerte_vial',
      'condicion_climatica_muerte_vial',
      'clase_victima_muerte_vial',
      'vehiculo_victima_muerte_vial',
      'arma_utilizada_homicidos_dolosos',
      'ocasion_delito_homicidos_dolosos',
      'sexo_homicidos_dolosos',
      'clase_victima_homicidos_dolosos',
      'vinculo_imputado_con_victima_homicidos_dolosos',
      'modalidad_suicidios',
      'sexo_suicida_suicidios',
      'edad_suicida',
      'sexo_testigo_suicidios',
      'edad_testigo_suicidios',
      'direccion_gps',
      'recupero_sustraido'
  ];

  public function dependencias()
  {
      return $this->hasMany('App\Dependencia');
  }
}
