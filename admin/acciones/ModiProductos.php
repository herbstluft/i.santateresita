<?php

use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../../vendor/autoload.php");

$query = new Select();
$obj = new ejecuta();
error_reporting(E_ERROR | E_PARSE);

session_start();

if($_POST){

  print_r($_POST);
  $nom=$_POST['nom'];
  $imagen=$_FILES['imagen']['name'];
  $precio=$_POST['precio'];
  $fecha=$_POST['fecha_v'];
  $formula=$_POST['formula'];
  $categoria=$_POST['categoria'];
  $desc=$_POST['desc'];



  // Guardar imagen
  $imagen=$_FILES['imagen']['name'];
  /////////  Crear imagenes temporales
  $imagen_temporal=$_FILES['imagen']['tmp_name'];
  //mover  imagen a carpeta imagenes
  move_uploaded_file($imagen_temporal,"../imagenes/".$imagen);


  $insert="INSERT INTO `productos` (`nom_producto`,`imagen`,`precio`,`fecha_vencimiento`,`id_cat`,`formula`,`descripcion`) VALUES ('$nom','$imagen','$precio','$fecha','$categoria','$formula','$desc')";
  $obj->ejecutar($insert);
}


//Seleccionar datos de los productos
$productos=$query->seleccionar("SELECT todo.id, todo.nombre, todo.precio, todo.fecha, todo.formula, todo.descripcion, todo.imagen, todo.categoria from
(SELECT productos.id_producto as id, productos.nom_producto as nombre, productos.precio as precio, productos.fecha_vencimiento as fecha, productos.formula as formula,
productos.id_cat as id_cat, productos.descripcion as descripcion, productos.IMAGEN as imagen, categoria.categoria as categoria from productos 
inner join categoria on categoria.id_cat=productos.id_cat) as todo");



if($_GET){
  $id=$_GET['borrar'];
 
  //borrar_imageen
  $imagen=$query->seleccionar("SELECT imagen FROM `productos` where id_producto=".$id);
  //borrar la imagen temporal (de la carpeta)
  unlink("imagenes/".$imagen[0]->imagen);
  //borrar producto
  $sql="DELETE FROM productos WHERE `productos`.`id_producto` =".$id;
  $obj->ejecutar($sql);
  
}

 
if(isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Carousel Template · Bootstrap v5.2</title>
    <link rel="stylesheet" href="../../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.rtl.min.css">

    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



    <style>

    .fonts{
    font-size: 17px;
    }
  
    </style>

    
  </head>
  <body>
    

  


<div class="container py-3">


<!--Barra de navegacion -->

<nav class="navbar navbar-expand-lg barra sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand" ><img src="../../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0  col-2 offset-6 col-md-2 offset-md-5" >
     
      </ul>
      <form class="d-flex" role="search">
        <br><br>
        
        &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  
        <?php
        if(isset($_SESSION['admin'])){
            ?>
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50px; position: relative; top:30px" name="cerrar_session">
          <a class="a" href="../index.php">  <?php echo "Atras" ?> </a></button>
            <?php
            } 
            ?>
          
      </form>
    </div>
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
  <link rel="stylesheet" href="/i.santateresita/bootstrap/css/index.css">
<div class="container">

  <div class="sombras" style="padding:4% ;">
    <div class="card-header ">
      <center><h2>Datos del producto</h2></center>
    </div>
    <div class="card-body">

      <form action="publicar.php" method="post" enctype="multipart/form-data">
        Nombre: <br>
        <input class="form-control" type="text" name="nom" required>
        <br>
        Precio: <br>
        <input class="form-control" type="number" name="precio" required>
        <br>
        Fecha Vencimiento;
        <input class="form-control" type="date" name="fecha_v">
        <br> 
        Formula: <br>
        <input class="form-control" type="text" name="formula">
        <br><br>
        Categoria: <br>
        <select class="form-select" aria-label="Default select example" name="categoria" required>
          
          <option value="1">Estomacal</option>
          <option value="2">Dolor</option>
          <option value="3">Fiebre</option>
          <option value="4">Suplementos Alimenticios</option>
          <option value="5">Gripa y tos</option>
          <option value="6">Material de curacion</option>
          <option value="7">Vitaminas y minerales</option>
          <option value="8">Sueros</option>
          <option value="9">Bienestar sexual</option>
          <option value="10">Ginecologia</option>
        </select>
        <br>
        Descripcion: <br>
        <input class="form-control" type="text" name="desc" minlength="20" maxlength="50" required>
        <br> <br>
        <button class="btn sombras registrarme" type="submit" id="registrarme" name="enviar" style="font-size:25px;">Modificar</button>

    </form>
    </div>
    
  </div>
  
   

<?php 
}
else{
  header("location: ../../error.php");
}
?>