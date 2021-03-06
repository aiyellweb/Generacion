<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Storage;

use App\Planeacion;
use App\Prealistamiento;
use App\Precostura;


use DB;
use Carbon\Carbon;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class PlaneacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('planeacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


         $estado='IN';   
        $planeacion = Planeacion::all();
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

        //de claraion de input

         $inputOp_id = $request->input('op_id');
         $inputPrecostura = $request->input('precostura');
         $inputGuard_id= $request->input('guard_id');

       

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

        }if($inputOp_id==true) {
            $this->validate($request,[
                    'guard_id'=>'required'

                ]);

           try{
               DB::beginTransaction();
                 $guardar_id = $request->guard_id;
                 $varids= $arrayids[]= ['id'=>$guardar_id];
                 $estadoPlaneacion= "salidaPre";
 
                 foreach ($varids as $key => $id) {
         //dd($id); 
            $mytime1 = Carbon::now('America/bogota');

            $planeacion=  Planeacion::whereIn('id',$id)->update(['salida_prealistamiento'=>$mytime1->toDateTimeString(),
            'estado'=>$estadoPlaneacion,    
            'user_id'=>auth()->user()->id

            ]);
               
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
    /// PRECOSTURA
    if ($inputPrecostura==true) {

         $this->validate($request,[
                    'guard_id'=>'required'

                ]);

         try{
               DB::beginTransaction();

               // declarion de variables
                 $guardar_id = $request->guard_id;
                 $varids= $arrayids[]= ['id'=>$guardar_id];
                 $estadoPlaneacion= "Precostura";
 
        // modificaion
                 foreach ($varids as $key => $id) {
         //dd($id); 
            $mytime1 = Carbon::now('America/bogota');
            $planeacion=  Planeacion::whereIn('id',$id)->update(['salida_prealistamiento'=>$mytime1->toDateTimeString(),
            'estado'=>$estadoPlaneacion,    
            'user_id'=>auth()->user()->id

            ]);
               
               //guardar datos
                 $planeacion_id= $request->precostura;
                 foreach ($planeacion_id as $key => $id) {
                    //dd($id);
                       $mytime = Carbon::now('America/bogota');
                       $ids_cantidad = $request->guard_id;
                       $cantidad=  Planeacion::select('cantidad_pares')->where('id',$id)->get();
                        //dd($cantidad);                            
                    $prealistamiento = new Precostura();
                    foreach ($cantidad as $key) {
                        $prealistamiento->op_id=$id;
                        
                        $prealistamiento->cantidad= $key->cantidad_pares;

                        $prealistamiento->fecha_entrada=$mytime;
                        $prealistamiento->estado="IN";
                        $prealistamiento->save();
                    }
                }

                // modificacion   
             $mytime1 = Carbon::now('America/bogota');
             $estado='finalizada';
             $cantidad=0;
            $modi_id = $request->guard_id;
            $varids= $arrayids[]= ['id'=>$modi_id];

             foreach($varids as $key => $id) {
            $planeacion=  Prealistamiento::whereIn('op',$id)->update(['fecha_modificacion'=>$mytime1->toDateTimeString(),
            'cantidad'=>$cantidad,    
            'estado'=>$estadoPlaneacion   
            

            ]);

        }
             

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




    public function informe(Request $request){
         
        //$request->input('estado');
        //dd($estadoProceso);
                
               if($request->input('estado')=='Precostura'){ 
              Excel::create('Laravel Excel', function($excel) {
 
            $excel->sheet('Productos', function($sheet) {
                  

               $planeacionEstado= DB::select(" 
               SELECT  DATEDIFF(now(),pre.fecha_entrada)as diasPasados,DATEDIFF(now(),pla.created_at) as DiasActuales,
                         pla.numero_op,pla.referencia,pla.cantidad_pares,now() as fecha_actual,pla.salida_prealistamiento as salida_op,
                         pre.fecha_entrada as ingresoproceso, pla.estado as estadoActual ,pla.created_at as Fecha_creacionOP
                         
                            from planeacion as pla
                                inner JOIN precostura as pre
                                 on pre.op_id=pla.id
                                 where pla.estado='Precostura'                
            

                ");
               //dd($planeacionEstado);


                 if (array_key_exists('estado',$planeacionEstado)) {
                     echo "existe";
                 }else{
                    return back()->with('info','NO existen datos');
                 }
                                   
               foreach ($planeacionEstado as $key) {


                     
               $dataPre[]=array(

                    'numero-op'=>$key->numero_op,
                    'Referencia'=>$key->referencia,
                    'CantidadAproducir'=>$key->cantidad_pares,
                    'fecha_actual'=>$key->fecha_actual,
                    'diasIngresoProceso'=>$key->diasPasados,
                    'Fechaingreso'=>$key->ingresoproceso,
                    'FechaOpCreacion'=>$key->Fecha_creacionOP,
                    'DiasEnplacion'=>$key->DiasActuales,
                    'fechaSalidaPlaneacion'=>$key->salida_op,
                    'EstadoActual'=>$key->estadoActual
                    

                );

              // dd($dataPre);

               

               }


                $sheet->fromArray($dataPre);
 
            });
        })->export('xls'); 

        }

        if($request->input('estado')=='salidaPre'){
           Excel::create('Laravel Excel', function($excel) {
 
            $excel->sheet('Productos', function($sheet) {
                  

               $planeacionEstado= DB::select(" 
                     SELECT  DATEDIFF(now(),pre.fecha_ingreso)as diasPasados,DATEDIFF(now(),pla.created_at) as DiasActuales,
                         pla.numero_op,pla.referencia,pla.cantidad_pares,now() as fecha_actual,pla.salida_prealistamiento as salida_op,
                         pre.fecha_ingreso as ingresoproceso, pla.estado as estadoActual ,pla.created_at as Fecha_creacionOP
                         
                            from planeacion as pla
                                inner JOIN prealistamientos as pre
                                 on pre.op=pla.id
                                 where pla.estado='salidaPre'                
            

                ");


                 if (array_key_exists('estado',$planeacionEstado)) {
                     echo "existe";
                 }else{
                    return back()->with('info','No existen datos');
                 }


               

              


               foreach ($planeacionEstado as $key) {


                   
                 
               $data[]=array(

                    'numero-op'=>$key->numero_op,
                    'Referencia'=>$key->referencia,
                    'CantidadAproducir'=>$key->cantidad_pares,
                    'fecha_actual'=>$key->fecha_actual,
                    'diasIngresoProceso'=>$key->diasPasados,
                    'Fechaingreso'=>$key->ingresoproceso,
                    'FechaOpCreacion'=>$key->Fecha_creacionOP,
                    'DiasEnplacion'=>$key->DiasActuales,
                    'fechaSalidaPlaneacion'=>$key->salida_op,
                    'EstadoActual'=>$key->estadoActual
                    

                );


               }

               //dd($data);

               


             


                $sheet->fromArray($data);
 
            });
        })->export('xls'); 




        }

        ////

        if ($request->input('estado')=='General') {
             Excel::create('Laravel Excel', function($excel) {
 
            $excel->sheet('Productos', function($sheet) {
                  
                  $data=Planeacion::all();  



                $sheet->fromArray($data);
 
            });
        })->export('xls'); 


        }


           

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
