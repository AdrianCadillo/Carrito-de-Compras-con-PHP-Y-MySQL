<?php
if(isset($_POST['addcarrito'])){
$DESCRIPCION = $_POST['descripcion'];
$PRECIO = $_POST['precio'];
$CANTIDAD = 1;
$FOTO =$_POST['foto'];
$ID =$_POST['idprod'];
/**
 * Verificamos si la key carrito de la session existe
 */
 if(!array_key_exists('carrito',$_SESSION)){
    $_SESSION['carrito'] =[]; /// si no existe le asignamos un array vacio
 }
 /**
  * Verificamos si ya existe el producto en carrito
  */
 if(!array_key_exists($DESCRIPCION,$_SESSION['carrito'])){
  $_SESSION['carrito'][$DESCRIPCION]['precio'] = $PRECIO;
  $_SESSION['carrito'][$DESCRIPCION]['cantidad'] = $CANTIDAD;
  $_SESSION['carrito'][$DESCRIPCION]['foto'] = $FOTO;
 if($_POST['addcarrito']=='addcarritotienda'){
   echo"<script>location.href='tienda.php'</script>"; 
 }else{
   echo"<script>location.href='producto.php?product=".$DESCRIPCION."&&id=".$ID."'</script>"; 
 }
 }else{
  $_SESSION['carrito'][$DESCRIPCION]['cantidad']+=1;
 }
}

 