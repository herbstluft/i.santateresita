<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

session_start();

$reporte="SELECT TYR.id_producto, TYR.nom_producto, TYR.precio, TYR.cantidad, TYR.SUBTOTAL, TYR.IVA ,(TYR.SUBTOTAL + TYR.IVA)as TOTAL 
FROM(SELECT FRG.id_producto, FRG.nom_producto, FRG.precio, FRG.cantidad, FRG.SUBTOTAL, (FRG.SUBTOTAL * 0.16)as IVA from 
(select productos.id_producto, productos.nom_producto, productos.precio, detalle_orden.cantidad, (productos.precio * detalle_orden.cantidad)
as SUBTOTAL from productos inner join detalle_orden on productos.id_producto = detalle_orden.id_producto inner join orden 
on orden.id_orden = detalle_orden.id_orden where orden.id_orden = '".$_GET['id_orden']."')as FRG)as TYR;";
$productos=$query->seleccionar($reporte);


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Santa Teresita</title>
    <link rel="stylesheet" href="../../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.rtl.min.css">
    <style>
      
     
      .fonts{
    font-size: 17px;
  }
  #tabla{
    min-width: 1000px;
  }    

    </style>

  </head>
  <body>

  <!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
     
<div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src="../../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      
      <br><br>
      <form class="d-flex primary" role="search" style="width:100%; position:relative;">
      <!--Buscar-->

    
      <input class="sombras light-table-filter " data-table="table_id" type="text" 
      placeholder="Buscar" style="width:90%; padding-left:2%;">

      

    
      </form>
           
      <button class="btn sombras iniciar" type="submit" style="height: 50px; width:10%; position: relative;" >
              <a  href="reportes.php" style="text-decoration:none"> < Atras </a></button>
</div>

     
<script src="../buscar/buscador.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</div>
</nav>
</div>


<div class="container">
<div class="table-responsive">
  <table class="table text-center sombras" id="tabla">
  <thead>
    <tr>
      <th scope="col">PRODUCTO</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">SUBTOTAL</th>
      <th scope="col">IVA</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <?php 

foreach($productos as $prod) {
  ?>
  <tbody>
    <tr>
  
      <td><?php echo $prod->nom_producto?></td>
      <td><?php echo "$".number_format($prod->precio,2,'.','.')?></td>
      <td><?php echo $prod->cantidad?></td>
      <td><?php echo "$".number_format($prod->SUBTOTAL,2,'.','.')?></td>
      <td><?php echo "$".number_format($prod->IVA,2,'.','.')?></td>
      <td><?php echo "$".number_format($prod->TOTAL,2,'.','.')?></td>

    </tr>
   
  </tbody>
  <?php
}
?>
</table>
</div>

</div>


<script src="../buscar/buscador.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>