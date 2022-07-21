<?php
if(isset($_REQUEST['delete'])){
  $descripcion = $_POST['descripcion'];
  /// eliminamos producto de la lista del carrito
  unset($_SESSION['carrito'][$descripcion]);
  echo "<script>location.href='carrito.php'</script>";
}

/**
 * vaciar carrito de compras
 */

if(isset($_REQUEST['vaciar'])){
    session_destroy();
    echo "<script>location.href='carrito.php'</script>";
}

/**
 * REDICIR LA CANTIDAD EN UNO 
 */
if(isset($_REQUEST['menos'])){
$descripcion = $_POST['descrip'];
if($_SESSION['carrito'][$descripcion]['cantidad']>1){
  $_SESSION['carrito'][$descripcion]['cantidad']-=1;
 
}
}


/**
 * Aumetar LA CANTIDAD EN UNO 
 */
if(isset($_REQUEST['mas'])){
  $descripcion = $_POST['descrip'];
  $_SESSION['carrito'][$descripcion]['cantidad']+=1;
  
}