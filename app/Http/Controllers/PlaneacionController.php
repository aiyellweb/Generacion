<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Storage;

use App\Planeacion;
use App\Prealistamiento;
use Excel;

use DB;
use Carbon\Carbon;
use Auth;
class PlaneacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


         $estado='IN';   
        $planeacion = Planeacion::where('estado',$estado)->get();
        $Prealistamiento= Prealistamiento::all();
        return  view('planeacion.create',compact('planeacion','Prealistamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */







    public function store(Request $request)
    {
        


     if(Input::hasFile('archivo')){

            $file=Input::file('archivo');  // para guardar el archivo temporal
            $path = Input::file('archivo')->getRealPath(); // para el archivo excel luego recorrerlo

            $nombre_original=$file->getClientOriginalName(); // el nombre del archivo
            $extension=$file->getClientOriginalExtension(); // la extencion del archivo
            $r1=Storage::disk('op')->put($nombre_original,  \File::get($file) ); // donde guardo el archivo 
     
            $data = Excel::load($path, function($reader) { 
            })->get();   

            $mytime = Carbon::now('America/bogota');

            $user_id = Auth::user()->id;
           $fecha_ingreso=$mytime->toDateTimeString();
           $estado_ingrero='IN';

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                     DB::table('planeacion')->insert(['numero_op' => $value->numero_op,'referencia' => $value->referencia,
                                  'referencia'=>$value->referencia,'cuero_color'=>$value->cuero_color,
                                   'suelo_color'=>$value->suelo_color,'tallas'=>$value->tallas,
                                   'cantidad_tallas_producir'=>$value->cantidad_tallas_producir,
                                   'cantidad_pares'=>$value->cantidad_pares,'cliente_nombre'=>$value->cliente,
                                    'user_id'=>$user_id,
                                   'created_at'=>$fecha_ingreso,'estado'=>$estado_ingrero
                    ]);


                }
             return back()->with('info','cargado Exitosamente');
            }

        }else{

           try{
               DB::beginTransaction();
                 $guardar_id = $request->guard_id;
                 $varids= $arrayids[]= ['id'=>$guardar_id];
                 $estadoPlaneacion= "salidaPre";

  
                 foreach ($varids as $key => $id) {
         //dd($id); 
            $mytime1 = Carbon::now('America/bogota');
            $planeacion=  Planeacion::whereIn('id',$id)->update(['salida_prealistamiento'=>$mytime1,
            'estado'=>$estadoPlaneacion,    
            'user_id'=>auth()->user()->id

            ]);

              
              //$varidcantidad= $arrayids[]= ['id'=>$ids_cantidad]; 
              /*
               foreach ($varidcantidad as $key => $id) {
                    $cantidad=  Planeacion::select('cantidad_pares')->whereIn('id',$id)->get();
                    dd($cantidad);                  
                }*/            

                

                

                ///prealistamiento
                          
                
                 //$mytime = Carbon::now('America/bogota');
                
               

                 //$planeacion_id= $request->op_id;

                   /* 
                 foreach ($planeacion_id as $id) {
                     # code...
                        $mytime = Carbon::now('America/bogota');
                        $ids_cantidad = $request->guard_id;
                        if(in_array($id,$ids_cantidad)){
                            $cantidad =  Planeacion::select('cantidad_pares')->where('id',$id)->get();
                            $prealistamiento = new Prealistamiento();

                            foreach ($cantidad as $key) {
                                $prealistamiento->op=$id;
                                
                                $prealistamiento->cantidad= $key->cantidad_pares;

                                $prealistamiento->fecha_ingreso=$mytime;
                                $prealistamiento->estado="IN";
                                $prealistamiento->save();
                            }
                        }
                 }*/


                 
                 $planeacion_id= $request->op_id;
                 foreach ($planeacion_id as $key => $id) {
                    //dd($id);
                       $mytime = Carbon::now('America/bogota');
                       $ids_cantidad = $request->guard_id;
                       $cantidad=  Planeacion::select('cantidad_pares')->where('id',$id)->get();
                        //dd($cantidad);        
                    
                    $prealistamiento = new Prealistamiento();
                    foreach ($cantidad as $key) {
                        $prealistamiento->op=$id;
                        
                        $prealistamiento->cantidad= $key->cantidad_pares;

                        $prealistamiento->fecha_ingreso=$mytime;
                        $prealistamiento->estado="IN";
                        $prealistamiento->save();
                    }
                }
                




                ///fin prealistamientos
                $guardar_id = $request->guard_id; 
                /*   
                $prealisModifi = new Prealistamiento();
                $prealisModifi->planeacionSalida($guardar_id);*/

              


              

                    



        }

                 
                
                DB::commit();

        }

        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
        }



     return back();
    } 

        

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
