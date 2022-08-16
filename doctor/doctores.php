<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doctores</title>
    <link rel="stylesheet" href="../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">

</head>
<body>
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
    <center>
      <b>
    <li class="nav-item i">
      <a class="nav-link fonts" aria-current="page" href="../index.php">Inicio</a>
    </li>
    <li class="nav-item i">
      <a class="nav-link fonts" href="../cliente/categorias.php">Categorias</a>
    </li>
    <li class="nav-item i">
      <a class="nav-link fonts" href="../citas/index_citas.php">Cita</a>
    </li>
    <li class="nav-item i">
      <a class="nav-link active fonts" href="nosotros.php">Nosotros</a>
    </li>
    </b>
  </center>
   &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
  </ul>
  <form class="d-flex" method="POST" action="nosotros.php" role="search">
    <br><br>
    </div>
  </div>
</nav>
<br><br>

<div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
      <h2 class="fw-normal">guanito</h2> 
        <br>
        <br><br>
      </div>

      <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
      <h2 class="fw-normal">mañuel</h2> 
        <br>
        <br><br>
      </div>

      <div class="row">
      <div class="col-12 col-xs-5 col-md-12 col-lg-5 offset-2 sombras text-center space">
      <h2 class="fw-normal">Jema</h2> 
        <br>
        <br><br>
      </div>



</body>
</html>