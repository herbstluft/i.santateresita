<?php
session_start();
if($_SESSION['usuario']){ 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/proyecto/farmacia.css">
 

  </head>
  <body>
  <div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="navbar-collapse collapse" id="navbarColor03" >
    
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
    
            <b>
          <li class="nav-item i">
            <a class="nav-link active fonts" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="index_citas.php">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/nosotros.php">Nosotros</a>
          </li>
          </b>
       
        </ul>
        <form class="d-flex" role="search">
          <br><br>
          
 
        </form>
      </div>
    </div>
  </nav>
 
  
 
  <br>


    <!--Contenido de la pagina-->

    <div class="sombras"> <!--Inicio-->
      <br>
      <center><h1>Citas</h1></center>
      <br>

      <form class="form1">
        Nombre:
        <select class="form-select sombras" aria-label="Disabled select example"  id="nom">
          <option selected>Escribe tu nombre</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select><br>
    
        Doctor:
        <br>
       <select class="form-select sombras" aria-label="Disabled select example"  id="doc">
          <option selected>Selecciona el Doctor</option>
          <option value="1">Ricardo Cabello Rodriguez</option>
          <option value="2">Eduardo Tapia Marquez</option>
          <option value="3">Nicole Cabello Rodriguez</option>
        </select><br>

    
        <center>  Hora:
        <input type="time" class="sombras" ><br><br> </center>
          <center> Fecha:
          <input type="date" class="sombras" id="fecha"><br><br></center>
        
          <!--BOTON DE CITA-->
          <center> <input type="submit" class="fadeIn fourth" value="Generar cita" name="cita"></center>
        
      </form>
    </div> <!--Fin-->

        <!--Boton flotante -->
  <div class="conta" id="d">
    <div class="boton">
      <input type="checkbox" id="btn-mas">
      <div class="redes">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-whatsapp"></a>
        </div>

        <div class="btn-mas">
          <label for="btn-mas" class="fa fa-plus"></label>
        </div>
    </div>
  </div>

</div>

  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="../bootstrap/js/background.js"></script>
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
else{


  header('location:../index.php');

}
?>
