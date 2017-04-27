<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precostura extends Model
{
    protected $table="precostura";

    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable=['op_id','cantidad','estado','fecha_entrada','fecha_salida'];


    public function planeacionPre(){

    	return $this->belongsTo('App\Planeacion','op_id');
    }
}
