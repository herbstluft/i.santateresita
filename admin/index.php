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
    <a class="navbar-brand" href="../index.php"><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
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



<br>


  <!--Contenido de la pagina-->
<div class="container">

  <div class="card">
    <div class="card-header">
      Datos del producto
    </div>
    <div class="card-body sombras">
      <form action="" method="post">
        Nombre: 
        <input class="form-control" type="text" name="nombre">
        Precio:
        <input class="form-control" type="number" name="precio">
        Fecha Vencimiento;
        <input class="form-control" type="date" name="nombre">
        Formula:
        <input class="form-control" type="text" name="formula">
        Categoria:
        <select class="form-select" aria-label="Default select example" name="selet">
          
          <option value="1">Estomacal</option>
          <option value="2">Dolor</option>
          <option value="3">Fiebre</option>
          <option value="4">Suplementos Alimenticios</option>
          <option value="5">Gripa y tos</option>
          <option value="6">Material de curacion</option>
          <option value="7">Vitaminas y minerales</option>
          <option value="8">Sueros</option>
          <option value="9">Bienestar sexual</option>
          <option value="10">Ginecologia</option>
        </select>
        Descripcion:
        <input class="form-control" type="text" name="descripcion">
        <br>
        <button class="btn btn-success" type="submit" name="publicar">Publicar</button>

    </form>
    </div>
    
  </div>
  
    
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Fecha Vencimiento</th>
        <th>Formula</th>
        <th>Categoria</th>
        <th>Descripcion</th>
      </tr>
    </thead>
    <tbody>
      <tr> 
        <td>1</td>
        <td>coca</td>
        <td>$223.09</td>
        <td>22/02/02</td>
        <td>Oxido de carbono</td>
        <td>Ginecologia</td>
        <td>Este es un producto</td>
      <tr>
    </tbody>
  </table>
  



</div>
  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>

<?php

    if ($_POST) {
      
    }

?>