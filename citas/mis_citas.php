
<?php

use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

session_start();


$citas=$query->seleccionar("SELECT todo.nombre, todo.app, todo.apm, todo.genero, todo.edad, todo.especialidad,todo.cedula, todo.universidad, todo.telefono, todo.correo, todo.id_cita, todo.hora, todo.fecha from
(SELECT citas.id_cita as id_cita, citas.id_doc, citas.hora as hora, citas.fecha as fecha,
datos_pers_user.nombre as nombre, datos_pers_user.apellido_pat as app, datos_pers_user.apellido_mat as apm, datos_pers_user.correo as correo,
datos_pers_user.edad as edad, datos_pers_user.telefono as telefono, datos_pers_user.genero as genero,
doctores.especialidad as especialidad, doctores.cedula as cedula, doctores.universidad as universidad,
clientes.user_clien as cliente

FROM citas 

inner  join clientes on clientes.id_client=citas.id_cliente
inner join doctores on citas.id_doc=doctores.id_doc
inner join usuarios on usuarios.id_usuario=doctores.id_usuarios
inner JOIN datos_pers_user on datos_pers_user.id_registro=usuarios.id_reg) as todo WHERE todo.cliente='juanii'");
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
    <a class="navbar-brand" ><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
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
        if(isset($_SESSION['cliente'])){
            ?>
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50px; position: relative; top:30px" name="cerrar_session">
          <a class="a" href="index_citas.php">  <?php echo "Regresar" ?> </a></button>
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
    

<div class="row row-cols-1 row-cols-md-12 row-cols-lg-3 mb-3 text-center">
  <?php foreach($citas as $cita) { ?>
      <!--Card-->
      <form method="post">
<div class="col">
      <div class="sombras mb-4 rounded-3 shadow-sm">
        <div class="sombras card-header py-3"">
          <h4 class="my-0 fw-normal"><?php echo "Doc."." ". $cita->nombre?>  <?php echo $cita->app ?></h4>
        </div>
        <div class="card-body">
        <br>
        <h6>Edad:  <?php echo $cita->edad?> </h6>
        <h6>Genero:  <?php echo $cita->genero?> </h6>
        <h6>Especialidad:  <?php echo $cita->especialidad?> </h6>
        <h6>Cedula:  <?php echo $cita->cedula?> </h6>
        <h6>Universidad:  <?php echo $cita->universidad?> </h6>
        <h6>Telefono:  <?php echo $cita->telefono?> </h6>
        <h6>Correo:  <?php echo $cita->correo?> </h6>
        <hr>
        <h6>Cita:  <?php echo $cita->id_cita?> </h6>
        <h6>Hora:  <?php echo $cita->hora?> </h6>
        <h6>Fecha:  <?php echo $cita->fecha?> </h6>


          <div class="d-grid gap-2 d-md-block">
           <form action="mis_citas.php" method="POST">
           
           <a href="?borrar=<?php echo $cita->id_cita; ?>">
            <button class="btn sombras br_btn" id="registrarme" type="button" name="cancelar">
              Cancelar cita
            </button>
            </a>

   
          </form>
            <?php
            if($_GET){

              $id=$_GET['borrar'];
              //borrar registro de cita
              $sql="DELETE FROM citas WHERE `citas`.`id_cita` =".$id;
              $insert->ejecutar($sql);
              header('location:mis_citas.php');
             
            }
            ?>
  
        
      
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

