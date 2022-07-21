<?php
class Service implements IService{
 private $conector;
 public function __construct()
 {
    $this->conector = new Conexion();
 }   

  /**
   * REALIZAR UN CRUD COMPLETO
   */ 
public function optimizeCrud($Query,$datos=array())
{
 try {
 $this->conector->pps = $this->conector->getConexion()
 ->prepare($Query);
  for($i=0;$i<count($datos);$i++){
    $this->conector->pps->bindParam(($i+1),$datos[$i],PDO::PARAM_LOB);
  }
  return $this->conector->pps->execute();
 } catch (\Throwable $th) {echo $th->getMessage();}finally{$this->conector->closeBD();}
}

/**
 * EXISTE DATOS verificar
 */
public function existsData($Query, $dato)
{
 try {
 $this->conector->pps =$this->conector->getConexion()
 ->prepare($Query);
 $this->conector->pps->bindParam(1,$dato,PDO::PARAM_STR);
 $this->conector->pps->execute();
 return $this->conector->pps->fetchAll(PDO::FETCH_ASSOC);
 } catch (\Throwable $th) {}finally{$this->conector->closeBD();}   
}
/**
 * MOSTRAR LOS DATOS
 */
public function showData($Tabla)
{
$this->conector->Query = "SELECT *FROM ".$Tabla;
try {
  $this->conector->pps = $this->conector->getConexion()
  ->prepare($this->conector->Query);
  $this->conector->pps->execute();
  return $this->conector->pps->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {}finally{$this->conector->closeBD();}
}

/**
 * Imagen por Id
 */
public function showImageId($Tabla, $Id)
{
$this->conector->Query = "SELECT *FROM ".$Tabla." WHERE id_producto=?";
try {
  $this->conector->pps = $this->conector->getConexion()
  ->prepare($this->conector->Query);
  $this->conector->pps->bindParam(1,$Id,PDO::PARAM_INT);
  $this->conector->pps->execute();
  $this->conector->res = $this->conector->pps->fetchAll(PDO::FETCH_ASSOC);
  return '<img src="data:image/jpeg;base64,'.base64_encode($this->conector->res[0]['imagen']).'" alt="" style="width:200px;height:200px;">';
} catch (\Throwable $th) {}finally{$this->conector->closeBD();}
}

/**
 * MOSTRAR POR ID
 */
public function findById($Tabla, $Id)
{
  $this->conector->Query = "SELECT *FROM ".$Tabla." WHERE id_producto=?";
  try {
   $this->conector->pps = $this->conector->getConexion()
   ->prepare($this->conector->Query);
   $this->conector->pps->bindParam(1,$Id,PDO::PARAM_INT);
   $this->conector->pps->execute();
   return $this->conector->pps->fetchAll(PDO::FETCH_ASSOC);
  } catch (\Throwable $th) {}finally{$this->conector->closeBD();}
}
}
 

 
 
