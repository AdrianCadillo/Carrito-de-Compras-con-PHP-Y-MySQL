<?php
require 'setting.php';
class Conexion{
public $Query;
private $Conetion=null;
public $pps;
public $res;
/**
 * Conexión con la base de datos
 */
 public function getConexion(){
 try{
    $this->Conetion = new PDO("mysql:host=".SERVIDOR.";dbname=".DATABASE,USUARIO,PASSWORD);
    $this->Conetion->exec("set names utf8");
 }catch(\Throwable $error){echo $error->getMessage();}
  return $this->Conetion;
 }

/**
 * Cerrrar la conexion
 */

 public function closeBD(){
 try {
 if($this->Conetion!=null)
 $this->Conetion = null;
 } catch (\Throwable $th) {
 }
 }

}


