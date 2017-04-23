<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Planeacion;
use Carbon\Carbon;
use Auth;
class Prealistamiento extends Model
{
   
	protected $table="prealistamientos";
	protected $primaryKey='id';
    public $timestamps=false;

	protected $fillable=['op','cantidad','fecha_ingreso','fecha_salida','estado'];

	public function Planeacion()
	
	{
		return $this->belongsTo('App\Planeacion','op');
	}


	public function planeacionSalida($id){

		$planeacion= Planeacion::find($id)->first();
		$mytime1 = Carbon::now('America/bogota');      
         $planeacion->updated_at=$mytime1;
         $planeacion->user_id= Auth::user()->id;
         $planeacion->update();				


	}


}
