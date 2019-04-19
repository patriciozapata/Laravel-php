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


// Enrutando controlador
Route::get('prueba/{name?}','Pruebacontroller@prueba');

//envuando parametros por  post
Route::get('/name/{name}/lastname/{lastname?}',function($name,$lastname = null){
  return'Hola mi Nombre: '.$name." Apellido: ".$lastname;
});

//enrutando  un archivo
Route::get('/mi_primer_ruta',function(){
    return 'Hello World';
});


Route::resource('trainers', 'TrainerControler');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pokemons','PokemonController');
