<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    protected $table="planeacion";
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable=['numero_op','referencia','cuero_color',
    'suelo_color','tallas','cantidad_tallas_producir','cantidad_pares','cliente_nombre','user_id','estado',
    'salida_prealistamiento','prealistamiento_id'

    ];

   public function Prealistamiento(){

   		return $this->hasMany('App\Prealistamiento');
   } 	

}
