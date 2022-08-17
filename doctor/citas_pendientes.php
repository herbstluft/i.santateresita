<?php

use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../vendor/autoload.php");

$query = new Select();
$obj = new ejecuta();
session_start();



$citas=$query->seleccionar("SELECT todo.cliente, todo.edad, todo.gen, todo.tel, todo.id, todo.rfc, todo.correo, todo.fecha, todo.hora from
(SELECT datos_pers_user.nombre, datos_pers_user.apellido_pat, datos_pers_user.apellido_mat, usuarios.usuario, citas.id_cliente, citas.id_cita as id, concat(clientes_datos_personales.nombre,' ', clientes_datos_personales.apellido_pat,' ',clientes_datos_personales.apellido_mat) as cliente, 
  clientes_datos_personales.edad as edad, clientes_datos_personales.genero as gen, clientes_datos_personales.RFC as rfc, clientes_datos_personales.telefono as tel, clientes_datos_personales.correo as correo, citas.realizadas as estado, citas.hora, citas.fecha from datos_pers_user 
  inner join usuarios on usuarios.id_reg = datos_pers_user.id_registro INNER JOIN doctores on doctores.id_usuarios = usuarios.id_usuario INNER JOIN citas on doctores.id_doc = citas.id_doc INNER JOIN clientes on clientes.id_client = citas.id_cliente inner join clientes_datos_personales on clientes.id_reg=clientes_datos_personales.id_cliente) as todo  WHERE todo.estado=0
  and todo.usuario='".$_SESSION['doctor']."'");
?>

<?php 
if(isset($_SESSION['doctor']))
{
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Citas Pendientes</title>
    <link rel="stylesheet" href="../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



    <style>

    .fonts{
    font-size: 17px;
    }
  
    
.button{
position:relative;
width: 130px;
height:50px;
font-size: 15px;
color: #000000;
border: none;
border-radius: 4px;
cursor: pointer;
transition: width .15s,
border-radius .5,
}

.button * {
position:absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
transition: opacity  .10s;
}
.icon{
opacity: 0;
}
.button:focus{
width: 50px;
background-color: #44c08a;
border-radius: 50%;
}
.button:focus .text{
opacity: 0;
}
.button:focus .icon{
opacity:1;
transition-delay: .20s;
}
    </style>

    
  </head>
  <body>
    



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
          <a class="nav-link active fonts" aria-current="page" href="index_doctor.php">Citas</a>
        </li>
        </b>
      </center>
      </ul>
      <form class="d-flex" role="search">
        <br><br>
        
        &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  
        <?php
        if(isset($_SESSION['doctor'])){
            ?>
            
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50px; position: relative; top:30px" >
              <a  href="ini.php" style="text-decoration:none"> < Atras </a></button>
            <?php
            } 
            ?>
      </form>
    </div>
  </div>
</nav>
<?php
}
else{
 
}
?>
  <!-- Fondo de video -->
  <div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
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
          <h4 class="my-0 fw-normal"><?php echo $cita->cliente?>  </h4>
        </div>
        <div class="card-body">
        <br>
        <h6>Edad:  <?php echo $cita->edad?> </h6>
        <h6>Genero:  <?php echo $cita->gen?> </h6>
        <h6>Telefono:  <?php echo $cita->tel?> </h6>
        <h6>RFC:  <?php echo $cita->rfc?> </h6>
        <h6>Correo:  <?php echo $cita->correo?> </h6>

        <hr>
   
        <h6>Fecha:  <?php echo $cita->fecha?> </h6>
        <h6>Hora:  <?php echo $cita->hora?> </h6>
      

          <div class="d-grid gap-2 d-md-block">
     
           <br>
           
           <!-- boton check animacion -->
          <button class="sombras btn"> <a style="text-decoration:none" href="citas_pendientes.php?real= <?php  echo $cita->id?>">Realizada</a></button>

         <!-- Fin boton check animacion -->

          </div>
          <br>
        </div>
    </div>
    </form>


    
</div>



  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>
<?php
  }

  
if(isset($_GET['real'])){
  foreach ($citas as $cita)
  $gft = $cita->id;
  $ti ="UPDATE citas set realizadas = '1' where id_cita = '$gft' ";
  $trc = $obj->ejecutar($ti);
}
          
            ?>
