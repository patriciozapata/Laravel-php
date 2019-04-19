<?php

//especifico de donde es
namespace LaraDex\Http\Controllers;


//usando controller  de una carpeta
use  LaraDex\Http\Controllers\Controller;


//creo clase para llevar informacion a  una ruita
class Pruebacontroller extends Controller
{
  //creo funcion para recibir 1 parametro 
  public function prueba($name=null){
    return 'Estoy dentro de pruebaController :D'.$name;
  }

}
