<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../../vendor/autoload.php");

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
    <link rel="stylesheet" href="../../../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.rtl.min.css">
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
        <source src="../../../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
     
<div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src="../../../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      
      <br><br>
      <form action="citas_real.php" method="post" style="width:100%; position:relative;">
      <!--Buscar-->

    
      <input class="sombras " name="buscar" type="text" 
      placeholder="Buscar" style="width:90%; padding-left:2%;">

      

    
      </form>
           
      <button class="btn sombras iniciar" type="submit" style="height: 50px; width:10%; position: relative;" >
              <a  href="../../index.php" style="text-decoration:none"> < Atras </a></button>
</div>

     
<script src="../../buscar/buscador.js"></script>
  <script src="../../../bootstrap/js/bootstrap.min.js"></script>
</div>
</nav>
</div>


<div class="container">

  <table class="table text-center sombras" id="tabla">
  <thead>
    <tr>
      
      <th scope="col">Cliente</th>
      <th scope="col">Edad</th>
      <th scope="col">Genero</th>
      <th scope="col">Telefono</th>
      <th scope="col">RFC</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
    </tr>
  </thead>
  <?php 
  extract($_POST);
  $buscar=$_POST['buscar'];


 

$reporte="SELECT todo.cliente, todo.edad, todo.gen, todo.tel, todo.rfc, todo.correo, todo.fecha, todo.hora from
(SELECT datos_pers_user.nombre, datos_pers_user.apellido_pat, datos_pers_user.apellido_mat, usuarios.usuario, citas.id_cliente, concat(clientes_datos_personales.nombre,' ', clientes_datos_personales.apellido_pat,' ',clientes_datos_personales.apellido_mat) as cliente, 
  clientes_datos_personales.edad as edad, clientes_datos_personales.genero as gen, clientes_datos_personales.RFC as rfc, clientes_datos_personales.telefono as tel, clientes_datos_personales.correo as correo, citas.realizadas as estado, citas.hora, citas.fecha from datos_pers_user 
  inner join usuarios on usuarios.id_reg = datos_pers_user.id_registro INNER JOIN doctores on doctores.id_usuarios = usuarios.id_usuario INNER JOIN citas on doctores.id_doc = citas.id_doc INNER JOIN clientes on clientes.id_client = citas.id_cliente inner join clientes_datos_personales on clientes.id_reg=clientes_datos_personales.id_cliente) as todo  WHERE todo.estado=0";
$productos=$query->seleccionar($reporte);

foreach($productos as $prod) {
  ?>
  <tbody>
    <tr>
      <th> <?php echo $prod->cliente?></th>
      <td><?php echo $prod->edad?></td>
      <td><?php echo $prod->gen?></td>
      <td><?php echo $prod->tel?></td>
      <td><?php echo $prod->rfc?></td>
      <td><?php echo $prod->correo?></td>
      <td><?php echo $prod->fecha?></td>
      <td><?php echo $prod->hora?></td>
      
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


<script src="../../buscar/buscador.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
