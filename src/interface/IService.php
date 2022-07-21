<?php
interface IService{
  /**
   * REALIZAR UN CRUD COMPLETO
   */ 
  public function optimizeCrud($Query,$datos=array()); 

 /**
  * YA EXISTE DATA
  */

 public function existsData($Query,$dato);

 /**
  * Visualizar datos
  */

public function showData($Tabla);

/**
 * Imagen por Id
 */
public function showImageId($Tabla,$Id);

/**
 * Mostrar por Id
 */
public function findById($Tabla,$Id);
}