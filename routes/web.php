<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('prueba',function(){

$user= new App\User();

$user->name="Admin";
$user->email="admin@hotmail.com";
$user->password=bcrypt('12345678');
$user->save();


});


Route::get('logout','Auth\LoginController@logout');

////////////////RUTAS DE TIPO RES/////////////////
Route::resource('planeacion','PlaneacionController');




///////////////////FIN DE RUTAS RES///////////////////


////////////////////////RUTAS DE POST/////////////////

Route::post('carga-OP','PlaneacionController@cargaMaxiva');


/////////////////////////FIN DE RUTAS TIPO POS/////////////////////////////////



