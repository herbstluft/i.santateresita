<?php
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);
session_start();
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
    

  <div class="fullscreen-container">
    <video loop muted autoplay poster="dist/img/office.jpg" class="fullscreen-video">
        <source src="https://player.vimeo.com/external/641767478.hd.mp4?s=d1e3f6e09192708d3ac42cc85979c361242f11f5&profile_id=174&oauth_token_id=1027659655" type="video/mp4">

    </video>
</div>


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
        <center>
          <b>
        <li class="nav-item i">
          <a class="nav-link fonts" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="categorias.php">Categorias</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="../citas/index_citas.php">Cita</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link active fonts" href="nosotros.php">Nosotros</a>
        </li>
        </b>
      </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
      </ul>
      <form class="d-flex" method="POST" action="nosotros.php" role="search">
        <br><br>
        
       &ensp; &ensp;  &ensp; &ensp;  
      <?php
           if($_SESSION['cliente']){
            ?>
         
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

  <div class="sombras">
    <br>
    
    <br>
    
    
    <div class="container">

    
    <div class="col">
       
      <div class="row">
         <div class="col-4 offset-1" >
          <img  src="../bootstrap/img/farmacianosotros.jpg" alt="" style="width:100%; border-radius: 60px 0px; position: relative;top: 5%; left: 10%;">
        </div>

        <div class="col-5" >
        <h1>Nosotros</h1>
        <br>
        <p class="col -5 nosotros" > 
           Iniciamos con nuestras operaciones en 1990 en Tlahualilo, Durango. Con el mismo compromiso de hace 32 años seguimos ofreciendo un gran 
           servicio a nuestros clientes.  Contamos con un catalago de diferentes productos de marcas comerciales y propias enfocados a ayudar a la salud y bienestar de nuestros clientes.
        </p> 
        <h6>Propósito</h6>
        <p class="col -5 nosotros" >Vidas más alegres a través de una mejor salud.</p>
        <h6>Misión</h6>
        <p  class="col -5 nosotros">Ayudamos a todas las personas a mejorar su calidad de vida a través de soluciones integrales de salud y bienestar.</p>
        <h6>Visión</h6>
        <p class="col -5 nosotros">Ser el socio líder en la reinvención del cuidado de la salud local y el bienestar para todos.</p>
      </div>
        </div>
      &ensp; &ensp; &ensp; &ensp;

    </div>  
    </div>



</div>

    <!--Boton flotante -->
    <div class="conta">
    <div class="boton">
      <input type="checkbox" id="btn-mas">
      <div class="redes">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-whatsapp"></a>
        </div>

        <div class=" btn-mas">
          <label for="btn-mas" class="fa fa-plus"></label>
        </div>



    </div>
  </div>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</body>
</html>