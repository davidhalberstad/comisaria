<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModusOperandy extends Model
{
      protected $table = 'modus_operandi';

      protected $fillable = [
        'id', 'modus_operandi'
      ];

}
