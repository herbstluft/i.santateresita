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
          <a class="nav-link fonts" href="#">Cita</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link active fonts" href="nosotros.php">Nosotros</a>
        </li>
        </b>
      </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
      </ul>
      <form class="d-flex" role="search">
        <br><br>
        
        <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
          <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg>
      </a>  &ensp; &ensp;  &ensp; &ensp;  
        <button class="btn sombras iniciar" type="submit">
          <a class="a" href="../registro/login.php">  Iniciar Session   </a></button>
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

        <div class="col-5">
        <h1>Nosotros</h1>
        <br>
        <p class="col -5 nosotros"> 
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