<?php 
include('../../admin/conexion.php');

$obj= new conexion();
$productos=$obj->consultar("SELECT * FROM `productos`");
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
    <!--fondo-->
    <canvas class="orb-canvas" width="313" height="781" style="touch-action: none; cursor: inherit;"></canvas>
     
<div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src="../../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <br><br>
      <form class="d-flex primary" role="search" style="width:100%; position:relative;">
      <!--Buscar-->

      <input class="sombras light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar" style="width:90%; padding-left:2%;">

      &ensp; &ensp;  &ensp; &ensp;  
    <div>
      <a href=""  data-bs-toggle="modal" data-bs-target="#modal_cart">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg> 
          </a> 
    </div>
     &ensp; &ensp;  &ensp; &ensp;  


           <button class="btn sombras iniciar" id="registrarme" type="submit" style="width:auto; height:50px; ">
          <a class="a" href="../../registro/login.php" style="position:relative; top: -5px;;" >  Iniciar Session   </a></button>
        
        </form>
      </div>
      </nav>
    </div>
 
 

 
  <br>


    <!--Contenido de la pagina-->
  <main>


  <div class="container">



  <?php
$conexion=mysqli_connect("localhost","root","","proyecto"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE productos.nom_producto LIKE'%".$busqueda."%'";
	}
  
}
?>
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

$conexion=mysqli_connect("localhost","root","","proyecto");               
$SQL="SELECT nom_producto,imagen,descripcion,precio,formula from productos $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){
?>

<tbody>
<tr>
<td class="sombras card-header"><?php echo $fila['nom_producto']; ?></td>
<td><img src="../../admin/imagenes/<?php echo $fila['imagen'];?>" class="im card-img-top" style="border-radius:10px"></td>
<td><?php echo $fila['descripcion']; ?></td>
<td class="sombras"><?php echo "$".$fila['precio']; ?></td>
<td><?php echo $fila['formula']; ?></td>

<td>
    <div class="d-grid gap-2 d-md-block">
           
           <button class="btn sombras br_btn" id="registrarme" type="button">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
             </svg> &ensp; Agregar
           </button>
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
  <script type="module" src="../../bootstrap/js/background.js"></script>
  

</body>
</html>
