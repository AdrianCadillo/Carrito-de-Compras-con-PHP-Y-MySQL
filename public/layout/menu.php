<?php
session_start();
require 'plantilla.php';
$cantidaCarrito=0;
if(isset($_SESSION['carrito'])){
$cantidaCarrito = count($_SESSION['carrito']);
}
?>
 
<nav class="navbar  sticky-top navbar-expand-lg navbar-warning bg-warning">
  <div class="container-fluid">
    <span class="navbar-text">
      <span class="float-start">
      <b class="text-white" style="font-family: 'Roboto Condensed', sans-serif;">TecnologySoft
      <img src="../img/tienda.png" alt="" style="width:30px;height:30px;">
      </b>
      </span>
    </span>
    <span class="float-end">
      <a href="../app/carrito.php" style="text-decoration:none;">
      <img src="../img/carrito.png" alt="" style="width:50px;height:50px;"  > 
      </a>
       <b class="text-white" style="font-family: 'Roboto Condensed', sans-serif;">( <?=$cantidaCarrito?> )</b>
      </span>
  </div>
</nav>