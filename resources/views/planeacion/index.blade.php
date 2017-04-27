
@extends ('layouts.admin')



    <html>
<head>
    <title>Datepicker</title>
 
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-standalone.css')}}">
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('locales/bootstrap-datepicker.es.min.js')}}"></script>
 
</head>
@section ('contenido')
<div class="container">
    <div class="content">
 
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4 col-md-offset-4">
 
                    <form action="{{Route('informe.consulta')}}" method="post">
                    		{{csrf_field()}}
                        <div class="form-group">
                            <label for="date-inicial">Fecha inicial</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="date-inicial">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date-final">Fecha Final</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="date-final">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
						  <label>Estado
                         <select name="estado"  class="form-control">

                       <option value="salidaPre">Prealistamiento</option>
                       <option value="Precostura">Precostura</option>

                    </select>
                 </div>
                    <button type="submit" class="btn btn-default btn-primary">Consultar</button>
						</div>		

                     
                    </form>
 
                </div>
            </div>
        </div>
    </div>
</div>
 
<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>



@endsection