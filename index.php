<?php 
    use MyApp\query\Select;
            require("vendor/autoload.php");
            
            $query = new Select();

            $cadena = "SELECT * from productos";
//Ejecutar consulta
            $productos = $query->seleccionar($cadena);


session_start();
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);

if($_GET['agregar'])
{
  $sql="insert into detalle_orden()";
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
    <link rel="stylesheet" href="bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
    <style>
      
     
      .fonts{
    font-size: 17px;
    color:white;
  }

  .fullscreen-container {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    z-index: -100;
}
.fullscreen-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
@media (min-aspect-ratio: 16/9) {
  .fullscreen-video {
    width: 100%;
    height: auto;
  }
}
@media (max-aspect-ratio: 16/9) {
  .fullscreen-video {
    width: auto;
    height: 100%;
  }
}
    
    </style>

  </head>


  <body>

     
<div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor03" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <center>
            <b>
          <li class="nav-item i">
            <a class="nav-link active fonts" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="citas/index_citas.php">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="cliente/nosotros.php">Nosotros</a>
          </li>
          </b>
        </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp;
        </ul>
        <?php
           if(isset($_SESSION['cliente'])){
            ?>
        <a href="carrito/index_carrito.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg>
        </a> 
        <?php 
}
else{

}
?>
     
              &ensp; &ensp;  &ensp; &ensp;  
        <form class="d-flex" method="POST" action="index.php" role="search">
          <br><br>

           &ensp; &ensp;  &ensp; 
           <?php
           if(isset($_SESSION['cliente'])){
            ?>
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50%; position: relative;" name="cerrar_session">
          <a class="a" href="src/scripts/logout.php"> Cerrar session </a></button>
            <?php
            } 
            elseif(isset($_SESSION['admin'])){
              ?>
          <button class="btn sombras iniciar col-8 " type="submit" style="height: 50%; position: relative;" name="cerrar_session">
          <a class="a" href="admin/index.php"> Regresar a inicio </a></button>

              <?php
             }
            else{
              ?>
               <button class="btn sombras iniciar" id="registrarme" type="submit">
              <a class="a" href="registro/login.php"  >  Iniciar Session   </a></button>
              <?php
            }
            ?>
        </form>
      </div>
    </div>
  </nav>
 

  
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
  <br>


    <!--Contenido de la pagina-->
  <main>

  



  
  <div class="row row-cols-1 row-cols-md-12 row-cols-lg-3 mb-3 text-center">
    <!-- Capturar productos en el foreach (carrito) -->
  <?php foreach($productos as $producto) { ?>  <!-- Datos de la consulta -->
      <!--Card-->
      <form action="carrito/index_carrito.php" method="post">
<div class="col">
      <div class="sombras mb-4 rounded-3 shadow-sm">
        <div class="sombras card-header py-3">
          <h4 class="my-0 fw-normal"><?php echo $producto->nom_producto?></h4>
        </div>
        <div class="card-body">
          <img src="admin/imagenes/<?php echo $producto->IMAGEN ?>" class="im card-img-top">
          <br><br>
          <h5>Descripcion</h5
       
          <p class="br_btn"> <?php echo $producto->descripcion;?> </p>
      
        <center>
        <b> Precio: </b> <?php echo "$".number_format($producto->precio,2, '.', '.');?> 
        </center>
        <br><br>
        <?php 
if(isset($_SESSION['cliente'])){
?>

          <div class="d-grid gap-2 d-md-block">
          <a href="carrito/index_carrito.php?agregar=<?php echo $producto->id_producto ?>"> <!--Enviar id de producto -->
            <button class="btn sombras br_btn" id="registrarme" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg> &ensp; Agregar 
            </button>
           </a>
          </div>
          <?php 
}
else{
  
}
?>
          <br>
        </div>
    </div>
    </form>

    </div>
    <?php  } ?>
    
    
</div>



</main>


<!--Boton flotante -->
<div class="conta">
    <div class="boton">
      <input type="checkbox" id="btn-mas">
      <div class="redes">
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/facebook-new.png"/></a>
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/whatsapp--v1.png"/></a>
          <a href="cliente/buscar/index_buscar.php" ><img src="https://img.icons8.com/ios-glyphs/25/FFFFFF/search--v1.png"/></a>
        </div>

        <div class=" btn-mas">
          <label for="btn-mas" class="fa fa-plus"></label>
        </div>



    </div>
 
  </div>    
<!-- Fin del boton flotante -->


  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="bootstrap/js/background.js"></script>
  </body>
</html>

