<?php 
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../../vendor/autoload.php");


session_start();
$query = new Select();
$productos=$query->seleccionar("select * from  productos inner JOIN categoria on productos.id_cat=categoria.id_cat WHERE categoria.categoria='Gripa y tos';");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Carousel Template · Bootstrap v5.2</title>
    <link rel="stylesheet" href="../../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.rtl.min.css">

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
        <source src="../../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->


<div class="container py-3">


<!--Barra de navegacion -->
<nav class="navbar navbar-expand-lg barra sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="../../index.php"><img src="../..//bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <center>
          <b>
        <li class="nav-item i">
          <a class="nav-link fonts" aria-current="page" href="../../index.php">Inicio</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="../../cliente/categorias.php">Categorias</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="#">Cita</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="../nosotros.php">Nosotros</a>
        </li>
        </b>
      </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
      </ul>
      <form class="d-flex" role="search">
        <br><br>
        
        <?php 
        if($_SESSION['cliente']){
          ?>
        <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
          <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg>
      </a> 
      <?php }
      ?>
      &ensp; &ensp;  &ensp; &ensp;  
      <?php
           if(isset($_SESSION['cliente'])  or isset($_SESSION['admin'])){
            ?>
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50%; position: relative;" name="cerrar_session">
          <a class="a" href="../../registro/logout.php">  <?php echo "Cerrar Session"?> </a></button>
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
  </div>
</nav>
  </div>



<br>


  <!--Contenido de la pagina-->
<div class="container">


    <?php include('card_producto.php') ?>
    
</div>
  



</div>

<?php include('boton_flotante.php') ?>
  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../../bootstrap/js/background.js"></script>

</body>
</html>