<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);
session_start();

?>

<?php
if($_SESSION['doctor']){

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Menu Doctores</title>
    <link rel="stylesheet" href="../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



    <style>

    .fonts{
    font-size: 17px;
    }
  
    </style>

    
  </head>
  <body>
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->


<div class="container py-3">


<!--Barra de navegacion -->

<nav class="navbar navbar-expand-lg barra sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
   
       
      
      </ul>
      <form class="d-flex" action="categorias.php" method="POST" role="search">
        <br><br>
        
       &ensp;  &ensp; &ensp;  &ensp; &ensp; 
      <?php
           if($_SESSION['doctor']){
            ?>
           <button class="btn sombras iniciar" id="registrarme" type="submit">
              <a class="a" href="../src/scripts/logout.php"  > Cerrar Session   </a></button>
            <?php
            } 
            else{
              ?>
               <button class="btn sombras iniciar" id="registrarme" type="submit">
              <a class="a" href="../registro/login.php"  >  Iniciar Session   </a></button>
              <?php
            }
            ?>
      </form>
    </div>
  </div>
</nav>

<br>


  <!--Contenido de la pagina-->
<div class="container">

  
  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.vexels.com/media/users/3/151869/isolated/preview/767ca771755f4675d4063c03e17c8595-icono-de-lista-de-verificacion-medica.png" alt="">
        <br><br>
        <h2 class="fw-normal">Citas Realizadas</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="citas_realizadas.php">Ir &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://equipatupizzeria.com/wp-content/uploads/2022/02/tiempo.png" alt="">
        <br><br>
        <h2 class="fw-normal">Citas Pendientes</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="citas_pendientes.php">Ir &raquo;</a></p>
      </div>
  </div>

 
  
   
</div>
</div>


<script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>



<?php
}
else {
  header("location: ../error.php");
}

?>