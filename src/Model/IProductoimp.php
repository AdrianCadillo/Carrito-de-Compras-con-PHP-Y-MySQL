<?php
require 'Serviceimpl.php';
class MProducto implements IProducto{

private $service;

public function __construct()
{
    $this->service = new Service();
}
 
/**
 * Guardar los productos
 */
public function save($descripcion, $precio, $imagen)
{
 $Query = "INSERT INTO productos(descripcion,precio,imagen) VALUES(?,?,?)";
 $QUERYEXISTE = "SELECT *FROM productos WHERE descripcion=?";
 $Foto = fopen($imagen, 'rb');
 $DATOS=[$descripcion,$precio,$Foto];   
 if(count($this->service->existsData($QUERYEXISTE,$DATOS[0]))==0){
    return $this->service->optimizeCrud($Query,$DATOS);
 }else{return 2;}
}
/**
 * MOSTRAR LOS DATOS DEL PRODUCTO
 */
public function all()
{
 
}
}