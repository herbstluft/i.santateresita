<?php
include('../conexion.php');
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
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="dist/img/office.jpg" class="fullscreen-video">
        <source src="https://player.vimeo.com/external/641767478.hd.mp4?s=d1e3f6e09192708d3ac42cc85979c361242f11f5&profile_id=174&oauth_token_id=1027659655" type="video/mp4">

    </video>
</div>
<!-- fin de video -->

<br>


  <!--Contenido de la pagina-->
<div class="container">

  
  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="http://s4.thingpic.com/images/zZ/HBdH8erKPYyTHDe1j9nX7AVz.png" alt="">
        <br><br>
        <h2 class="fw-normal">Estomacal</h2> <br>
        <p>Bloquear el ácido y otras secreciones del estómago también puede bloquear la absorción de la vitamina B-12.</p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/estomacal.php">Ver productos &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://www.prensalibre.com/wp-content/uploads/2019/08/shutterstock_1187048224.jpg?quality=52&w=760&h=430&crop=1" alt="">
        <br><br>
        <h2 class="fw-normal">Dolores</h2> <br>
        <p>Calman el dolor porque cortan la inflamación que lo provoca. </p><br><br>
        <p><a class="btn sombras" id="registrarme" href="productos/dolores.php">Ver productos &raquo;</a></p>
      </div>
  </div>

  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2018/08/07/21/57/fever-3590869__340.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Fiebre</h2> <br>
        <p>Estos medicamentos están indicados para combatir y disminuir el nivel de la temperatura corporal.<p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/fiebre.php">Ver productos &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2015/08/02/14/27/vitamin-b-871135__340.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Suplementos Alimenticios</h2> <br>
        <p>Los suplementos alimenticios son productos destinados a cubrir, complementar o incrementar la ingesta de determinados nutrientes en la dieta.</p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/suplementos.php">Ver productos &raquo;</a></p>
      </div>
  </div>


  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2020/03/29/15/35/coronavirus-4981176__340.png" alt="">
        <br><br>
        <h2 class="fw-normal">Gripa y tos</h2> 
        <p>Se utilizan para reducir y aliviar los síntomas de la gripe como garganta irritada, la coriza y/o la tos.<p>
        <br>
        <p><a class="btn sombras" id="registrarme" href="productos/gripa.php">Ver productos &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2013/04/22/01/13/wound-106374__340.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Material de curación </h2> <br>
        <p>Suele ser desechable pues entra en contacto con bacterias y virus que le impiden ser reutilizado.</p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/material.php">Ver productos &raquo;</a></p>
      </div>
  </div>


  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2012/04/10/17/40/vitamins-26622__340.png" alt="">
        <br><br>
        <h2 class="fw-normal">Vitaminas y minerales</h2> <br>
        <p>Estimulan el funcionamiento del sistema inmunitario, y ayudan a las células y a los órganos a desempeñar sus respectivas funciones.<p>
        <br>
        <p><a class="btn sombras" id="registrarme" href="productos/vitaminas.php">Ver productos &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.freepik.com/vector-premium/linda-coleccion-medicamentos-aislada-sobre-fondo-rosa_598722-13.jpg?w=2000" alt="">
        <br><br>
        <h2 class="fw-normal">Sueros </h2> <br>
        <p>Ayudan a tratar el acné, el envejecimiento, las manchas, poros abiertos, flacidez cutánea, etc.</p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/sueros.php">Ver productos &raquo;</a></p>
      </div>
  </div>


  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2017/06/24/22/32/lingerie-2439134__340.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Bienestar Sexual</h2> <br>
        <p>estos productos permiten proteger la zona íntima de la mujer ante cualquier fricción no deseada.<p>
        <br>
        <p><a class="btn sombras" id="registrarme" href="productos/bienestar.php">Ver productos &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2020/05/21/14/08/pregnant-woman-5200901__340.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Ginecologia</h2> <br>
        <p>Estos productos ayudan a un mejor tratamiento para la mujer en el proceso de embarazo</p><br>
        <p><a class="btn sombras" id="registrarme" href="productos/ginecologia.php">Ver productos &raquo;</a></p>
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