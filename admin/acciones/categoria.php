<?php

use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;
session_start();

require("../../vendor/autoload.php");
$query = new Select();
$obj = new ejecuta();
error_reporting(E_ERROR | E_PARSE);


 
if($_SESSION['admin']){
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
      <center><h2>Nombre de la categoria</h2></center><br>
    </div>
    <div class="card-body">

      <form action="categoria.php" method="post" enctype="multipart/form-data">
        Nombre: 
        <input class="form-control" type="text" name="nom" required>
        <br> <br>
        
        <button class="btn sombras registrarme" type="submit" id="registrarme" name="enviar" style="position:relative;left:50%;font-size:25px; height:auto; width:auto">Publicar</button>

    </form>
    </div>
    
  </div>
  
    <br><br>
 

      <?php
 
 //comprobar si existe
if(isset($_POST['enviar'])){
  include '../../src/data/conexion_sqli.php';
$ver="Select categoria from categoria where categoria='$nom'";
$resultados=mysqli_query($conexion,$ver);
$num=mysqli_num_rows($resultados);


if($num==0){
  //insertando producto

  
  $nom=$_POST['nom'];

  $insert="INSERT INTO `categoria` (`categoria`) VALUES ('$nom')";
  $res=$obj->ejecutar($insert);
?>


<div class="alert alert-success text-center" role="alert">
  Categoria publicada correctamente!
</div>
<?php
}
else{
  ?>
  <div class="alert alert-danger text-center" role="alert">
 Esta categoria ya existe en el sistema!
</div>
<?php
}
     ?>

</div>
  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../../bootstrap/js/background.js"></script>

</body>
</html>


<?php 
}

}
else{
    header("location: ../../error.php");
}
?>
