@extends ('layouts.admin')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">


@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cargar op</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>


	  @if(session()->has('info'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{session('info')}}</strong> 
		</div>
    @endif
		

			{!!Form::open(['route'=>'planeacion.store','method'=>'POS','files'=>true])!!}
            {{Form::token()}}
    <div class="row">

 <div class="form-group col-xs-12"  >
             <label>Agregar Archivo de Excel </label>
              <input name="archivo" id="archivo" type="file"   class="archivo form-control"  /><br /><br />
      
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Subir</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>
    </div>   
			{!!Form::close()!!}	

<hr>




    <div class="panel-body">
        <table class="table table-bordered responsive" id='eps_table'>
            <thead>
              <th>#O.P</th>
              <th>Referencia</th>
              <th>Tallas</th>
              <th>Total A producir</th>
              <th>Estado Actual</th>
              <th>Procesos</th>
              <th>Guardar</th>
            </thead>
            <tbody>
            @foreach($planeacion as $key)
                <tr>
                    <td>{{$key->numero_op}}</td>
                    <td>{{$key->referencia}}</td>
                    <td>{{$key->tallas}}</td>
                    <td>{{$key->cantidad_pares}}</td>
                    <td>{{$key->estado}}</td>
                    <td>
                     <div class="container-fluid">    
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="op_id[]" value="{{$key->id}}">
                        <span class="custom-control-indicator" ></span>
                        <span class="custom-control-description">Prealistamiento</span>
                        </label>
                        </div>

                       <div class="container-fluid">    
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="precostura[]" value="{{$key->id}}">
                        <span class="custom-control-indicator" ></span>
                        <span class="custom-control-description">Precostura</span>
                        </label>
                        </div>                      

                    </td>

                    <td>
                    	 <div class="container-fluid">		
							<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="guard_id[]" value="{{$key->id}}">
							<span class="custom-control-indicator" ></span>
							<span class="custom-control-description">Guardar</span>
							</label>
							</div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
<div class="form-group col-xs-5">
 <input class="btn btn-primary" type="submit" value="Guardar Seleccionadas"></input>	
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

<!-- Tether -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

<!-- Bootstrap 4 Alpha JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>



<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>

@endsection