<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");
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
   
          <b>
        <li class="nav-item i">
          <a class="nav-link fonts" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts active" href="categorias.php">Categorias</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="../citas/index_citas.php">Cita</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="nosotros.php">Nosotros</a>
        </li>
        </b>
      &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp; 
      </ul>
      <form class="d-flex" action="categorias.php" method="POST" role="search">
        <br><br>
        
       &ensp;  &ensp; &ensp;  &ensp; &ensp; 
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
<div class="container">

  
  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://static.vecteezy.com/system/resources/previews/002/693/886/non_2x/vaccine-bottle-gradient-linear-icon-vial-with-drug-and-syringe-pharmaceutical-remedy-medication-for-flu-thin-line-color-symbols-modern-style-pictogram-isolated-outline-drawing-vector.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Publicar</h2> <br>
        <h5>Publicar productos en la tienda en linea</h5><br>
        <p><a class="btn sombras" id="registrarme" href="productos/estomacal.php">Publicar &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.emojiterra.com/google/noto-emoji/v2.034/512px/1f50d.png" alt="">
        <br><br>
        <h2 class="fw-normal">Buscar</h2> <br>
        <h5>Busca y elimina productos.</h5><br><br>
        <p><a class="btn sombras" id="registrarme" href="/index.php">Ir &raquo;</a></p>
      </div>
  </div>

  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://us.123rf.com/450wm/rastudio/rastudio1802/rastudio180200302/96103932-hombre-caucásico-joven-que-camina-con-bolsas-de-compras-de-plástico-con-verduras-saludables-y-frutas.jpg?ver=6" alt="">
        <br><br>
        <h2 class="fw-normal">Modo Cliente</h2> <br>
        <h5>Mirate como un cliente</h5><br>
        <p><a class="btn sombras" id="registrarme" href="productos/fiebre.php">Ir &raquo;</a></p>
      </div>
    
      
  
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.freepik.com/vector-gratis/ilustracion-coleccion-medicos-enfermeras-dibujos-animados_23-2148920403.jpg?w=2000" alt="">
        <br><br>
        <h2 class="fw-normal">Doctores</h2> <br>
        <h5>Ver los doctores que atienden.</h5><br>
        <p><a class="btn sombras" id="registrarme" href="productos/suplementos.php">Ir &raquo;</a></p>
      </div>
  </div>
  
  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="http://4.bp.blogspot.com/-cVO8CTsGC1w/Um0SOZz6fDI/AAAAAAAAAok/dopUSBWisYs/s1600/Reporte+I.png" alt="">
        <br><br>
        <h2 class="fw-normal">Reportes</h2> <br>
        <h5>Ver reporte de venta diario</h5><br>
        <p><a class="btn sombras" id="registrarme" href="productos/estomacal.php">Publicar &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.freepik.com/vector-premium/creatividad-e-imaginacion-crear-contenido-inspiracion-escritor-o-creador-nueva-idea-pensar-pensar-concepto-lluvia-ideas-hombre-motivado-sentado-columpio-dentro-idea-bombilla-usando-nube-dibujo-lapiz_212586-891.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Creadores</h2> <br>
        <h5>Ver los creadores de la paginas</h5><br><br>
        <p><a class="btn sombras" id="registrarme" href="/index.php">Ir &raquo;</a></p>
      </div>
  </div>


  </div>
   
</div>
</div>
<!--Boton flotante -->
<div class="conta">
    <div class="boton">
      <input type="checkbox" id="btn-mas">
      <div class="redes">
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/facebook-new.png"/></a>
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/whatsapp--v1.png"/></a>
          <a href="../cliente/buscar/index_buscar.php" ><img src="https://img.icons8.com/ios-glyphs/25/FFFFFF/search--v1.png"/></a>
        </div>

        <div class=" btn-mas">
          <label for="btn-mas" class="fa fa-plus"></label>
        </div>



    </div>
 
  </div>    
<!-- Fin del boton flotante -->

<script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>