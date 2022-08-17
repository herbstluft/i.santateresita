<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

session_start();

$reporte="SELECT KV.id_orden as VENTA, KV.nombre as Cliente, KV.tiempo as Fecha, SUM(KV.CantidadProd)as Cantidad, SUM(KV.Total)as Total from (select orden.id_orden ,clientes_datos_personales.nombre, productos.nom_producto, orden.tiempo, sum(detalle_orden.cantidad)as CantidadProd, sum(productos.precio * detalle_orden.cantidad)as Total from clientes_datos_personales inner join clientes on clientes_datos_personales.id_cliente = clientes.id_reg inner join detalle_orden on detalle_orden.cliente = clientes.user_clien inner join orden on orden.id_orden = detalle_orden.id_orden inner join productos on productos.id_producto = detalle_orden.id_producto where detalle_orden.estatus and detalle_orden.id_orden=orden.id_orden= 1 group by clientes_datos_personales.nombre, orden.id_orden, productos.nom_producto, orden.tiempo)as KV group by KV.nombre, KV.id_orden";
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
     
<script src="buscador.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</div>
</nav>
</div>


  <table class="table">
  <thead>
    <tr>
      <th scope="col">VENTA</th>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <?php 
foreach($productos as $prod) {
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php {echo $prod->VENTA?></th>
      <td><?php echo $prod->Cliente?></td>
      <td><?php echo $prod->Fecha?></td>
      <td><?php echo $prod->Cantidad?></td>
      <td><?php echo $prod->Total;}?></td>

    </tr>
   
  </tbody>
  <?php
}
?>
</table>


<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
