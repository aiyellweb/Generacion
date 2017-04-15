<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    protected $table="planeacion";

    protected $fillable=['numero_op','referencia','cuero_color',
    'suelo_color','tallas','cantidad_tallas_producir','cantidad_pares'

    ];
}
