          <?php
          use MyApp\data\Database;
          use MyApp\query\ejecuta;
          use MyApp\query\Select;
          
session_start();
          require("../../vendor/autoload.php");

          $query = new Select();
          $insert = new ejecuta();
          ?>

<?php


    if(isset($_POST['registrar'])){
      extract($_POST);

//Insertar datos del doctor//
  $consulta="INSERT INTO datos_pers_user (nombre, apellido_pat, apellido_mat, correo, edad, genero, telefono) VALUES('$nom','$ap','$am','$corr','$edad','$gen','$tel')";
  $insert->ejecutar($consulta);
  //Imprimir los datos del doctor""
  $doc="SELECT datos_pers_user.id_registro from datos_pers_user where datos_pers_user.nombre='$nom'";
  $id=$query->seleccionar($doc);
  foreach($id as $bolo)
  $id_doc=$bolo->id_registro;

//insertar datos del doc a tabla usuarios//
  $doct="INSERT INTO usuarios (usuario,contrasena,tipo_usuario,id_reg) VALUES ('$user','$contra','3','$id_doc')";
  $insert->ejecutar($doct);

  //traemos los datos del doctor//
  $docc="SELECT usuarios.id_usuario from usuarios where usuarios.usuario='$user'";
  $id_user=$query->seleccionar($docc);
  foreach($id_user as $usur)
  $id_ser=$usur->id_usuario;


//insertar datos del doctor en tabla doctores//
$doc_i="INSERT INTO `doctores` (`id_doc`, `id_usuarios`, `cedula`, `especialidad`, `universidad`) VALUES (NULL, '$id_ser', '$cedula', '$especialidad', '$escuela')";
$insert->ejecutar($doc_i);

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registro doctor</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/proyecto/farmacia.css">
 

  </head>
  <body>          
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->

<div class="container">
  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php"><img src="../../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
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
            <a class="nav-link fonts" href="../../cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="#">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../../cliente/nosotros.php">Nosotros</a>
          </li>
          </b>
        </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;
        </ul>
        <form class="d-flex" role="search">
          <br><br>
            <?php
            if(isset($_SESSION['admin'])){
          ?>
           &ensp; &ensp;  &ensp; &ensp;  
          <button class="btn sombras iniciar" type="submit">
            <a class="a" href="doctores/doc.php">  Atras   </a></button>
            <?php 

            }
            else{
            ?>
 &ensp; &ensp;  &ensp; &ensp;  
          <button class="btn sombras iniciar" type="submit">
            <a class="a" href="login.php">  Iniciar Session   </a></button>
            <?php
            }
            ?>
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
    
    <form action="registro_doctor.php" method="post">

    <br>
        <div class="input-group mb-3">
            &ensp; &ensp; &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4 " placeholder="Nombre" name="nom" minlength="10" maxlength="24" required > 
            &ensp; &ensp;
            <input type="text" class="sombras_input form-control col-4 " placeholder="Apellido Paterno" name="ap"  maxlength="24" required>
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
            <input type="text" class="sombras_input form-control col-4" placeholder="Especialidad" name="especialidad"  minlength="10" required>
            &ensp;
            <input type="text" class="sombras_input form-control col-4" placeholder="Cedula" name="cedula" required>
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
        <center><div class="input-group mb-9">
        <div>
        <input type="text" class="sombras_input form-control col-4"  placeholder="Usuario" name="user" required>
        &ensp; &ensp; &ensp; &ensp;
        </div>
        <div>
        <input type="password" class="sombras_input form-control col-4" placeholder="Contraseña" name="contra" required>
        &ensp; &ensp; &ensp; &ensp;
        </div> 
        </div></center>
     
    
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

