<?php
require '../layout/menu.php';
require '../../src/config/database.php';
require '../../src/interface/IService.php';
require '../../src/interface/IProducto.php';
require '../../src/Model/IProductoimp.php';
require '../../src/Controller/TiendaController.php';
/**
 * Verificamos si existe lo que enviamos por get
 */
if (isset($_REQUEST['id']) and isset($_REQUEST['product'])) {
    $id = $_GET['id'];
    $service = new Service();
    $Producto_X_Id = $service->findById("productos", $id);
}
?>

<div class="container-fluid p-4">
    <div class="card shadow border-primary">
        <div class="card-header bg-primary text-white">
            <span class="float-start">
                <h4 style="font-family: 'Roboto Condensed', sans-serif;">Producto <b>Detallado</b></h4>
            </span>
            <span class="float-end">
                <button class="Boton-add-cesta" onclick="location.href='tienda.php'"> Volver</button></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6  col-12">
                    <br>
                    <img src="data:image/jpeg;base64,<?= base64_encode($Producto_X_Id[0]['imagen']) ?>" alt="" class="img-fluid">
                </div>

                <div class="col-xl-6 col-lg-6 col-12" style="font-family: 'Roboto Condensed', sans-serif;">
                    <br><br>
                    <h2><b><?= $Producto_X_Id[0]['descripcion'] ?></b></h2>
                    <h3><b>Precio : S/. </b> <b><?= $Producto_X_Id[0]['precio'] ?></b></h3>
                    <p>
                        <?= $Producto_X_Id[0]['descprod'] ?>
                    </p>
                    <div class="text-center">
                        <form action="" method="post">
                            <input type="text" value="<?= $Producto_X_Id[0]['descripcion'] ?>" name="descripcion" hidden>
                            <input type="text" value="<?= $Producto_X_Id[0]['precio'] ?>" name="precio" hidden>
                            <input type="text" value="<?= base64_encode($Producto_X_Id[0]['imagen']) ?>" name="foto" hidden>
                            <input type="text" value="<?= $Producto_X_Id[0]['id_producto'] ?>" name="idprod" hidden>
                            <button class="btn-add-car" name="addcarrito" value="addcarritodetalle"> <b> Añadir a Carrito</b> <i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>