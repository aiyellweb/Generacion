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
   

   $varids= $arrayids[]= ['id'=>$id];
  
	foreach ($varids as $key => $id) {
		 //dd($id);	
		
		$mytime1 = Carbon::now('America/bogota');
		$planeacion=  Planeacion::whereIn('id',$id)->update(['salida_prealistamiento'=>$mytime1,
			'user_id'=>auth()->user()->id

			]);

		


			/*     
         $planeacion->updated_at=$mytime1;
         $planeacion->user_id= Auth::user()->id;
         $planeacion->update();*/		
					
		}			


					


	}


}
