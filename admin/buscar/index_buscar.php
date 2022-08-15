<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

session_start();

$productos=$query->seleccionar("SELECT * FROM `productos`");


if($_GET){
  $id=$_GET['eliminar'];
 
  //borrar_imageen
  $imagen=$query->seleccionar("SELECT imagen FROM `productos` where id_producto=".$id);
  //borrar la imagen temporal (de la carpeta)
  unlink("../imagenes/".$imagen[0]->imagen);
  //borrar producto
  $sql="DELETE FROM productos WHERE `productos`.`id_producto` =".$id;
  $insert->ejecutar($sql);
  
}
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

      &ensp; &ensp;  &ensp; &ensp;  
    <div>
    <?php 
          if(isset($_SESSION['cliente'])){
            ?>
          <a href=""  data-bs-toggle="modal" data-bs-target="#modal_cart" >
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" style="top:10px; position:relative;" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg> 
          </a> 
          <?php
          }
          ?>
   

           &ensp; 
           <?php
           if(isset($_SESSION['cliente'])){
            ?>
            
            <?php
            } 
            else{
              ?>
               <button class="btn sombras iniciar" id="registrarme" type="submit">
              <a class="a" href="../../registro/login.php"  >  Iniciar Session   </a></button>
              <?php
            }
            ?>


        </form>
      </div>
      </nav>
    </div>
  <!-- Fondo de video -->
  <div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->

 
  <br>


    <!--Contenido de la pagina-->
  <main>


  <div class="container">




</form>



<table id="tabla" class="sombras table table-borderless table_id table align-middle text-center " style="width:100%; border:0px;">

                   
<thead class="sombras card-header">    
    <tr >
        <th >Nombre</th>
        <th>Imagen</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Formula</th>
        <th>Acciones</th>
    </tr>
</thead>


<?php

               
$SQL="SELECT id_producto, nom_producto,imagen,descripcion,precio,formula from productos";
$con=$query->seleccionar($SQL);

if(!empty($con)){
  foreach($con as $fila) {
?>

<tbody>
<tr>
<td class="sombras card-header"><?php echo $fila->nom_producto;?></td>
<td><img src="../../admin/imagenes/<?php echo $fila->imagen;?>" class="im card-img-top" style="border-radius:10px"></td>
<td><?php echo $fila->descripcion;?></td>
<td class="sombras"><?php echo "$".number_format($fila->precio, 2, '.', '.');?></td>
<td><?php echo $fila->formula;?></td>

<td>
    <div class="d-grid gap-2 d-md-block">
    <a href="index_buscar.php?eliminar=<?php echo $fila->id_producto ?>"> <!--Enviar id de producto -->
           <button class="btn sombras br_btn" id="registrarme" type="button">
           <img src="https://img.icons8.com/material-outlined/24/000000/trash--v1.png"/> Eliminar
           </button>
    </a>
    </div>
</td>

</tr>


<?php
}
}

?>
</table>


</div>
</main>



<script src="buscador.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
