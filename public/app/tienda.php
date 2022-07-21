<?php
require '../layout/menu.php';
require '../../src/config/database.php';
require '../../src/interface/IService.php';
require '../../src/interface/IProducto.php';
require '../../src/Model/IProductoimp.php';
require '../../src/Controller/TiendaController.php';
$service = new Service();
$ProductoM = new MProducto();
$listaProductos = $service->showData("productos");
?>
<div class="container-fluid p-3">
   <div class="row">
      <?php
      foreach ($listaProductos as $key => $value) { ?>

         <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-2">
            <div class="card shadow border-primary">
               <div class="card-header text-center" style="background:blue;color:white">
                  <b style="font-family: 'Roboto Condensed', sans-serif;"><?= $value['descripcion'] ?></b>
                  <br>
                  <b style="font-family: 'Roboto Condensed', sans-serif;">Precio S/ : <?= $value['precio'] ?></b>
               </div>

               <div class="card-body">
                  <?= $service->showImageId("productos", $value['id_producto']) ?>
               </div>

               <div class="card-footer text-center">
                  <form action="" method="post">
                     <input type="text" value="<?= $value['descripcion'] ?>" name="descripcion" hidden>
                     <input type="text" value="<?= $value['precio'] ?>" name="precio" hidden>
                     <input type="text" value="<?=base64_encode($value['imagen'])?>" name="foto" hidden>
                     <input type="text" value="<?=$value['id_producto']?>" name="idprod" hidden>
                     <button class="Boton-add-cesta" name="addcarrito" value="addcarritotienda" style="font-family: 'Roboto Condensed', sans-serif;">carrito
                        <i class="fas fa-shopping-cart m-1"></i>
                     </button>
                    <a href="producto.php?product=<?=$value['descripcion']?>&&id=<?=$value['id_producto']?>" class="Boton-comprar" sstyle="font-family: 'Roboto Condensed', sans-serif;"> ver detalle <i class="fas fa-shopping-cart"></i></a>
                  </form>
               </div>
            </div>
         </div>

      <?php } ?>
   </div>
</div>