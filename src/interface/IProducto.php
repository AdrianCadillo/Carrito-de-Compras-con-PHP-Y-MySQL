<?php
interface IProducto{

 /**
  * Guardar los productos  a la base de datos con imagenes 
  */   
public function save($descripcion,$precio,$imagen);
    
/**
 * mostrar los datos del productos
 */

 public function all();
}