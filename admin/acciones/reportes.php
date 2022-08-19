<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

session_start();
error_reporting(E_ERROR | E_PARSE);





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
      <form action="reportes.php" method="post" style="width:100%; position:relative;">
      <!--Buscar-->

    
      <input class="sombras " name="buscar" type="text" 
      placeholder="Buscar" style="width:90%; padding-left:2%;">

      

    
      </form>
           
      <button class="btn sombras iniciar" type="submit" style="height: 50px; width:10%; position: relative;" >
              <a  href="../index.php" style="text-decoration:none"> < Atras </a></button>
</div>

     
<script src="../buscar/buscador.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</div>
</nav>
</div>


<div class="container">

  <table class="table text-center sombras" id="tabla">
  <thead>
    <tr>
      <th scope="col">VENTA</th>
      <th></th>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cantidad</th>
      <th scope="col">SUBTOTAL</th>
      <th scope="col">IVA</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <?php 
  extract($_POST);
  $buscar=$_POST['buscar'];


 

$reporte="SELECT RTY.VENTA, RTY.Cliente, RTY.Fecha, RTY.Cantidad, RTY.subtotal, RTY.IVA, (RTY.subtotal + RTY.IVA)as TOTAL FROM (SELECT GY.VENTA, GY.Cliente, GY.Fecha, GY.Cantidad, GY.subtotal, (GY.subtotal * 0.16)as IVA FROM (SELECT KV.id_orden as VENTA, KV.nombre as Cliente, KV.tiempo as Fecha, SUM(KV.CantidadProd)as Cantidad, 
SUM(KV.Total)as subtotal from (select orden.id_orden ,clientes_datos_personales.nombre, productos.nom_producto, orden.tiempo, 
sum(detalle_orden.cantidad)as CantidadProd, sum(productos.precio * detalle_orden.cantidad)as Total from clientes_datos_personales 
inner join clientes on clientes_datos_personales.id_cliente = clientes.id_reg inner join detalle_orden 
on detalle_orden.cliente = clientes.user_clien inner join orden on orden.id_orden = detalle_orden.id_orden 
inner join productos on productos.id_producto = detalle_orden.id_producto group by clientes_datos_personales.nombre, orden.id_orden, 
productos.nom_producto, orden.tiempo)as KV group by KV.id_orden)as GY)as RTY where month(RTY.Fecha)='$buscar';";
$productos=$query->seleccionar($reporte);

foreach($productos as $prod) {
  ?>
  <tbody>
    <tr>
      <th> <?php echo $prod->VENTA?></th>
      <th scope="row"><button class="btn btn-warning"><a href="reportexprod.php?id_orden=<?php echo $prod->VENTA ?>">Ver productos</a> </button></th>
      <td><?php echo $prod->Cliente?></td>
      <td><?php echo $prod->Fecha?></td>
      <td><?php echo $prod->Cantidad?></td>
      <td><?php echo "$".number_format($prod->subtotal,2,'.','.')?></td>
      <td><?php echo "$".number_format($prod->IVA,2,'.','.')?></td>
      <td><?php echo "$".number_format($prod->TOTAL,2,'.','.')?></td>

    </tr>
   

    
  </tbody>
  <?php
}

?>
</table>
<?php
if(isset($_POST['buscar'])){
if(empty($productos)){
  
  ?>
  <div class="alert sombras text-center" style="width:50%;margin-left:auto; margin-right:auto; margin-top:5%" role="alert">
  <h4 style="color:red">Lo sentimos no se encontraron resultados! </h4>
</div>
<?php

}
}
if(!isset($_POST['buscar'])){
  ?>
  <div class="alert sombras text-center" style="width:50%;margin-left:auto; margin-right:auto; margin-top:5%" role="alert">
  <h4 style="color:#0d6efd">Filtra un mes para ver los resultados! </h4>
</div>
<?php
}
else{}
?>

</div>


<script src="../buscar/buscador.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
