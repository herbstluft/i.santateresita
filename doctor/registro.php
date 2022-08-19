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
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->

<div class="container">
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
            <b> &ensp; &ensp;
          <li class="nav-item i">
            <a class="nav-link fonts" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="#">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/nosotros.php">Nosotros</a>
          </li>
          </b>
        </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
        </ul>
        <form class="d-flex" role="search">
          <br><br>
          
           &ensp; &ensp;  &ensp; &ensp;  
          <button class="btn sombras iniciar" type="submit">
            <a class="a" href="login.php">  Iniciar Session   </a></button>
        </form>
      </div>
    </div>
  </nav>
 
  
 
  <br><br>



    <!--Contenido de la pagina-->
  <main class="sombras">
  <br>
      <center>
         <h1>Citas Pendientes</h1>
        <br><br>
  <div>
        <h3>Lista de Citas </h3>

      <form action="" method="POST">
        <br>
            <p>
             <label>Ingresa la fecha de la cita a consultar</label>
             <input type="date" for="fecha" name="fecha" placeholdera="--Ingresa la fecha de la cita a consultar--" required>
            </p>

         <p class="block">
              <button type="submit">
                Mostrar lista de citas
              </button>
              </p> <br> <br>
      </form>
  </div>

  <div style="width: 100%" class="container">
              <table class="table">
                <thead class="table table-dark">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Cliente</th>
                  </tr>



                </thead>


              </table>

  </div>
     
        
        

  </center>


</main>
<br><br>
</div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="../bootstrap/js/background.js"></script>
</body>
</html>

