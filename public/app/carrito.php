<?php
require '../layout/menu.php';
require '../../src/Controller/CarritoController.php';
$item = 0;
$importe = 0.00;
$Total = 0;
$Sub_Total = 0.00;
$Igv = 0.00;
$Valor_Igv = 1.18;
?>
<div class="container mt-3">
<div  class="row">
 <div class="card shadow border-dark">
    <div class="card-header bg-dark text-white">
       <span class="float-start">
       <h4 style="font-family: 'Roboto Condensed', sans-serif;">Tus Productos añadidos a <b class="text-primary">Carrito</b></h4>
       </span>
       <span class="float-end">
        <button class="Boton-add-cesta" onclick="location.href='tienda.php'">Volver al catálogo 
            <i class="fas fa-list"></i>
        </button>
       </span>
    </div>

    <div class="card-body table-responsive">
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr  style="font-family: 'Roboto Condensed', sans-serif;">
                <th>ITEM</th>
                <th class="text-center">FOTO</th>
                <th style="width:300px;" class="text-center">CANTIDAD</th>
                <th style="width:400px;">DESCRIPCIÓN</th>
                <th style="width:160px;">PRECIO</th>
                <th style="width:160px;">IMPORTE (S/.)</th>
                <th style="width:280px;" class="text-center">QUITAR</th>
            </tr>
            </thead>
            <tbody>
             <?php
             if(isset($_SESSION['carrito']) and count($_SESSION['carrito'])>0){
             echo '
             <tr colspan="6">
             <form action="" method="post">
             <button class="btn-delete" name="vaciar">Vaciar Carrito <i class="fas fa-trash-alt"></i></button>
             </form> 
             </tr>
             '; 
             foreach ($_SESSION['carrito'] as $key => $carrito) {
              $item+=1;
              $importe = $carrito['precio']*$carrito['cantidad'];
              $Total+=$importe;/// total del importe a pagar
              $Sub_Total = $Total/$Valor_Igv; // cuándo el igv ya está incluido en el producto
              $Igv = $Total-$Sub_Total;
             ?> 
             <tr>
             <td class="pt-4"><?=$item?></td>
             <td>
              <img src='data:image/jpeg;base64,<?=$carrito['foto']?>' alt="" style="width:80px;height:80px;">
             </td>
             <td class="pt-4">
              <form action="" method="post">
              <input type="text" value="<?=$key?>" name="descrip" hidden>
              <div class="input-group">
              <button class="col-xl-4 col-lg-4  col-12 btn btn-danger btn-sm" name="menos"> <i class="fas fa-minus"></i></button>
              <input type="text" disabled name="cantida" value="<?=$carrito['cantidad']?>"
              class="form-control col-xl-4 col-lg-4 col-12">
              <button class="col-xl-4 col-lg-4 col-12 btn btn-primary btn-sm" name="mas"> <i class="fas fa-plus-circle"></i></button>  
            </div>
              </form>
             </td> 
             <td class="pt-4"><?=$key?></td>
             <td class="pt-4"><b class="text-success">S/. </b><?=$carrito['precio']?></td>
             <td class="pt-4"><b class="text-success">S/.</b> <?=number_format($importe,2,',',' ')?></td>
             <td class="pt-4 text-center">
               <form action="" method="post">
                <input type="text" value="<?=$key?>" hidden name="descripcion">
                <button class="btn-delete" name="delete">Quitar <i class="fas fa-close"></i></button>
               </form> 
             </td>  
             </tr>
            <?php }
             }else{
                echo "<td colspan='7'  class='text-white text-center'><div class='alert alert-danger'>No hay productos agregados al carrito
                 <a href='tienda.php' class='btn btn-primary btn-sm'>Ir al catálogo <i class='fas fa-list'></i></a><div></td>";
             }
            ?>
            </tbody>
            <tfoot>
                 <?php
                   if(isset($_SESSION['carrito']) and count($_SESSION['carrito'])>0){
                  ?>
                <td colspan="5" style="font-family: 'Roboto Condensed', sans-serif;"><h4>Total a pagar </h4></td>
                <td colspan="1" style="font-family: 'Roboto Condensed', sans-serif;"><h4>S/. <?=number_format($Total,2,',','')?></h4></td>
                <td>  
                  <form action="" method="post">
                  <button class="btn-pago" name="pago">Pagar <i class="fas fa-dollar-sign"></i></button>
                  <img src="../img/tipopago.png" class="img-fluid" alt="" style="width:100px;height:44px;">
                  </form>
                
                </td>
                <tr>
                  <td colspan="5" style="font-family: 'Roboto Condensed', sans-serif;"><h4>Sub Total </h4></td>
                  <td colspan="1" style="font-family: 'Roboto Condensed', sans-serif;"><h4>S/. <?=number_format($Sub_Total,2,',','')?></h4></td>
                </tr>
                <tr>
                  <td colspan="5" style="font-family: 'Roboto Condensed', sans-serif;"><h4>IGV </h4></td>
                  <td colspan="1" style="font-family: 'Roboto Condensed', sans-serif;"><h4>S/. <?=number_format($Igv,2,',','')?></h4></td>
                </tr>
                <?php } ?>
            </tfoot>
      </table>
      
    </div>
 </div>
</div>
</div>
<br>
 