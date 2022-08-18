<!doctype html>
<html lang="en">
  <head>
    <title>Registro doctor</title>
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
      <h1>Nuevo Doctor</h1>
      <p style="font-size: 18px;">Registra a un nuevo Doctor.</p>
    </center>
    
    <form action="../src/scripts/registrar_doctor.php" method="post">

    <br>
        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4 " placeholder="Nombre" name="nom" minlength="10" maxlength="25" required > 
            &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4 " placeholder="Apellido Paterno" name="ap"  maxlength="20" required>
            &ensp; &ensp; &ensp; &ensp;
        </div>

        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Apellido Materno" name="am" maxlength="20"  required>
            &ensp; &ensp;
            <input type="email" class="sombras_input form-control col-4" placeholder="Correo Electronico" name="corr" maxlength="20" required>
            &ensp; &ensp; &ensp; &ensp;
        </div>

        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Especialidad" name="edad"  minlength="10" required>
            &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Cedula" name="edad" required>
            &ensp; &ensp;
            <input type="number" class="sombras_input form-control col-4" placeholder="Edad" name="edad" maxlength="2" required>
            &ensp;
            <input type="number" class="sombras_input form-control col-4" placeholder="Telefono" name="tel" minlength="10" maxlength="10" Required>
            
    
                    <div class="col-6 " style="position:relative; left:2%; width:26%;">
                    
                      <input class="form-check-input" type="radio" name="gen" value="F" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                          Femenino
                      </label>
                      <br>
                      <input class="form-check-input" type="radio" name="gen" id="flexRadioDefault2" value="M" checked>
                      <label class="form-check-label" for="flexRadioDefault2">
                      Masculino
                      </label>
                  </div>
        </div>

        <div class="input-group mb-3">
             &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Escuela" name="escuela" required>
            &ensp; &ensp; &ensp; &ensp;
        </div>


        <br>
 
        <center>
        <button class="btn sombras registrarme" id="registrarme" name="registrar" type="submit">Registrarme</button>
        </center>
        

    </form>


</main>
<br><br>
</div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="../bootstrap/js/background.js"></script>
</body>
</html>

