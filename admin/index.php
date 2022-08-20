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
if($_SESSION['admin']){

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
   
       
      
      </ul>
      <form class="d-flex" action="categorias.php" method="POST" role="search">
        <br><br>
        
       &ensp;  &ensp; &ensp;  &ensp; &ensp; 
      <?php
           if($_SESSION['admin']){
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
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://static.vecteezy.com/system/resources/previews/002/693/886/non_2x/vaccine-bottle-gradient-linear-icon-vial-with-drug-and-syringe-pharmaceutical-remedy-medication-for-flu-thin-line-color-symbols-modern-style-pictogram-isolated-outline-drawing-vector.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Publicar</h2> <br>
        <h5>Publicar productos en la tienda en linea</h5><br>
        <p><a class="btn sombras" id="registrarme" href="acciones/publicar.php">Publicar &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.emojiterra.com/google/noto-emoji/v2.034/512px/1f50d.png" alt="">
        <br><br>
        <h2 class="fw-normal">Buscar</h2> <br>
        <h5>Busca y elimina productos.</h5><br><br>
        <p><a class="btn sombras" id="registrarme" href="../admin/buscar/index_buscar.php">Buscar &raquo;</a></p>
      </div>
  </div>

  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://us.123rf.com/450wm/rastudio/rastudio1802/rastudio180200302/96103932-hombre-caucásico-joven-que-camina-con-bolsas-de-compras-de-plástico-con-verduras-saludables-y-frutas.jpg?ver=6" alt="">
        <br><br>
        <h2 class="fw-normal">Modo Cliente</h2> <br>
        <h5>Mirate como un cliente</h5><br>
        <p><a class="btn sombras" id="registrarme" href="../index.php">Ir &raquo;</a></p>
      </div>
    
      
  
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.freepik.com/vector-gratis/ilustracion-coleccion-medicos-enfermeras-dibujos-animados_23-2148920403.jpg?w=2000" alt="">
        <br><br>
        <h2 class="fw-normal">Doctores</h2> <br>
        <h5>Ver los doctores que atienden.</h5><br>
        <p><a class="btn sombras" id="registrarme" href="acciones/doctores/doc.html">Ir &raquo;</a></p>
      </div>
  </div>
  
  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://cdn-icons-png.flaticon.com/512/1055/1055644.png" alt="">
        <br><br>
        <h2 class="fw-normal">Reportes</h2> <br>
        <h5>Ver reporte de venta diario</h5><br>
        <p><a class="btn sombras" id="registrarme" href="acciones/reportes.php">Ir &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.freepik.com/vector-premium/creatividad-e-imaginacion-crear-contenido-inspiracion-escritor-o-creador-nueva-idea-pensar-pensar-concepto-lluvia-ideas-hombre-motivado-sentado-columpio-dentro-idea-bombilla-usando-nube-dibujo-lapiz_212586-891.jpg" alt="">
        <br><br>
        <h2 class="fw-normal">Creadores</h2> <br>
        <h5>Ver los creadores de la paginas</h5><br><br>
        <p><a class="btn sombras" id="registrarme" href="acciones/creadores/creadores.html">Ir &raquo;</a></p>
      </div>
  </div>

  <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.vexels.com/media/users/3/151869/isolated/preview/767ca771755f4675d4063c03e17c8595-icono-de-lista-de-verificacion-medica.png" alt="">
        <br><br>
        <h2 class="fw-normal">Citas Realizadas</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="acciones/citas/citas_real.php">Ir &raquo;</a></p>
      </div>
    
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://equipatupizzeria.com/wp-content/uploads/2022/02/tiempo.png" alt="">
        <br><br>
        <h2 class="fw-normal">Citas Pendientes</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="acciones/citas/citas_pend.php">Ir &raquo;</a></p>
      </div>
  </div>

  <div class="row">

  <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.vexels.com/media/users/3/151869/isolated/preview/767ca771755f4675d4063c03e17c8595-icono-de-lista-de-verificacion-medica.png" alt="">
        <br><br>
        <h2 class="fw-normal">Citas Perdidas</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="acciones/citas/citas_real.php">Ir &raquo;</a></p>
      </div>
 
 
      
      <div class="col-12 col-xs-12 col-md-12 col-lg-5 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.icons8.com/external-smashingstocks-circular-smashing-stocks/100/000000/external-delete-webmobile-applications-smashingstocks-circular-smashing-stocks.png" alt="">
        <br><br>
        <h2 class="fw-normal">Productos Eliminados</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="acciones/prod_eliminados.php">Ir &raquo;</a></p>
      </div>
  </div>

  <div class="row">

  <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
        <br>
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://img.icons8.com/external-others-iconmarket/64/000000/external-category-user-experience-others-iconmarket-3.png" alt="">
        <br><br>
        <h2 class="fw-normal">Agregar Categoria</h2> <br>
        <p><a class="btn sombras" id="registrarme" href="acciones/categoria.php">Ir &raquo;</a></p>
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