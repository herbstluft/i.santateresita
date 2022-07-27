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

   <!--fondo-->
   <canvas class="orb-canvas" width="313" height="781" style="touch-action: none; cursor: inherit;"></canvas>
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
          <center>
            <b> &ensp; &ensp;
          <li class="nav-item i">
            <a class="nav-link fonts" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="#">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="#">Nosotros</a>
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
      <h1>Registrarte</h1>
      <p style="font-size: 18px;">Es rápido y fácil.</p>
    </center>
    
    <form action="" method="post">

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
            <input type="email" class="sombras_input form-control col-4" placeholder="Correo Electronico" name="corr" required>
            &ensp; &ensp; &ensp; &ensp;
        </div>

        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Edad" name="edad" maxlength="2" required>
            &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Telefono" name="tel" minlength="10" maxlength="10">
    
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
            <input type="text" class="sombras_input form-control col-4" placeholder="RFC" name="rfc" required>
            &ensp; &ensp; &ensp; &ensp;
        </div>


        <br>

        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Nombre de usuario" name="nom_us" minlength="5" maxlength="20" required> &ensp;
            <input type="password" class="sombras_input form-control col-4" placeholder="Contraseña" name="us_cont" required> &ensp;
            <input type="password" class="sombras_input form-control col-4" placeholder="Confirmar contraseña" name="conf_cont">
            &ensp; &ensp; &ensp; &ensp;
        </div>
        <br>

  
        <center>
        <button class="btn sombras registrarme" id="registrarme" name="registrar" type="submit">Registrarme</button>
        </center>
        

    </form>


</main>



    <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="../bootstrap/js/background.js"></script>
</body>
</html>


<?php

    include('../conexion.php');
    if (isset($_POST['registrar'])) {
        
            $nombre=$_POST['nom'];
            $ap=$_POST['ap'];
            $am=$_POST['am'];
            $correo=$_POST['corr'];
            $edad=$_POST['edad'];
            $genero=$_POST['gen'];
            $tel=$_POST['tel'];
            $rfc=$_POST['rfc'];
            

            $nom_usuario=$_POST['nom_us'];
            $us_cont=$_POST['us_cont'];
            $conf_cont=$_POST['conf_cont']; 

            if ($edad>=18 && $us_cont==$conf_cont) {
             
                  $insert_clientes="INSERT INTO clientes (user_clien, contrasena) VALUES ('$nom_usuario','$us_cont')";
                  $insert_reg="INSERT INTO clientes_datos_personales (nombre, apellido_pat, apellido_mat, correo, edad, genero, telefono, RFC) VALUES ('$nombre', '$ap', '$am', '$correo', '$edad', '$genero', '$tel', '$rfc')";

                  $resultado=mysqli_query($conexion,$insert_reg);
                  $resultado2=mysqli_query($conexion,$insert_clientes);

                

                  if ($resultado&&$resultado2) {
                    ?>  <div class="alert alert-success" role="alert">
                        <center> Registro completado correctamente! </center>
                        </div>
                    <?php
                  } 
                  else{
                    ?>  <div class="alert alert-danger" role="alert">
                        Advertencia!
                        </div>
                    <?php
                  }
          }
          else{
            ?>  <div class="alert alert-danger" role="alert">
                <center> Lo sentimos usted es menor de edad o las contraseñas no coinciden </center>
            </div>
        <?php
          }

          }
      
        
            
        
            


   
?>  