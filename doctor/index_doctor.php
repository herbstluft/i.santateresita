
<?php
include('../admin/conexion.php');


$obj= new conexion();
$citas=$obj->consultar("SELECT todo.Nombre, todo.Ap_Pat, todo.Ap_Mat, todo.Correo, todo.Edad, todo.Genero, todo.Telefono, todo.RFC from 
(select clientes_datos_personales.nombre as Nombre,clientes_datos_personales.apellido_pat as Ap_Pat, clientes_datos_personales.apellido_mat as Ap_Mat, clientes_datos_personales.correo as Correo, clientes_datos_personales.edad as Edad, clientes_datos_personales.genero as Genero, clientes_datos_personales.telefono as Telefono, clientes_datos_personales.RFC as RFC from citas
inner JOIN  clientes on clientes.id_client=citas.id_cliente
inner JOIN clientes_datos_personales on clientes_datos_personales.id_cliente=clientes.id_reg) as todo");
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
    

    <!--fondo-->
    <canvas class="orb-canvas" width="313" height="781" style="touch-action: none; cursor: inherit;"></canvas>


<div class="container py-3">


<!--Barra de navegacion -->

<nav class="navbar navbar-expand-lg barra sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand" ><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0  col-2 offset-6 col-md-2 offset-md-5" >
        <center>
          <b>
        <li class="nav-item i text-center">
          <a class="nav-link active fonts" aria-current="page" href="index.php">Inicio</a>
        </li>
        </b>
      </center>
      </ul>
      <form class="d-flex" role="search">
        <br><br>
        
        &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  
        <button class="btn sombras iniciar col-8 " type="submit" style="height: 50%; position: relative; top: 25px;">
          <a class="a" href="login.php">  Cerrar Session   </a></button>
      </form>
    </div>
  </div>
</nav>
  </div>


<br>


  <!--Contenido de la pagina-->
<div class="container">

<div class="row row-cols-1 row-cols-md-12 row-cols-lg-3 mb-3 text-center">
  <?php foreach($citas as $cita) { ?>
      <!--Card-->
      <form method="post">
<div class="col">
      <div class="sombras mb-4 rounded-3 shadow-sm">
        <div class="sombras card-header py-3"">
          <h4 class="my-0 fw-normal"><?php echo $cita['Nombre']?>  <?php echo $cita['Ap_Pat'] ?></h4>
        </div>
        <div class="card-body">
        <br>
    <div class="col-12">
    <ul>
        <li>h1</li>
        <li>ss</li>
        <li>ss</li>
    </ul>
    </div>
          <div class="d-grid gap-2 d-md-block">
           
            <button class="btn sombras br_btn" id="registrarme" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg> &ensp; Agregar
            </button>
  
        
      
          </div>
          <br>
        </div>
    </div>
    </form>

    </div>
    <?php  } ?>
    
    
</div>



</div>
  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>