<?php 
    use MyApp\query\Select;
            require("../../../vendor/autoload.php");
            
            $query = new Select();

            //obtener nombre de doctores
            $cadena = "SELECT todo.universidad, todo.doctor
            from (SELECT doctores.universidad as universidad, concat(datos_pers_user.nombre,' ',datos_pers_user.apellido_pat,' ',datos_pers_user.apellido_mat) as doctor 
            from doctores inner join usuarios on doctores.id_usuarios=usuarios.id_usuario inner join datos_pers_user on datos_pers_user.id_registro=usuarios.id_reg) as todo ";
//Ejecutar consulta
            $doctores = $query->seleccionar($cadena);

//ocultar warnings
error_reporting(E_ERROR | E_PARSE);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">

    <title>Document</title>
</head>
<body>



  <center>
    <a href="../../index.php">
    <button class="custom-btn btn-16">Atras</button>

  </a>
          </center>
          

  <!-- Fondo de video -->
<div class="fullscreen-container " >
  <video loop muted autoplay poster="" class="fullscreen-video">
      <source src="../../../bootstrap/img/back.mp4" type="video/mp4">

  </video>
</div>
<!-- fin de video -->
<br>



<div class="body2">


    <ul class="cards">
    <?php foreach ($doctores as $doc) { ?>
        <li>
          <a href="" class="card">
            <img src="https://i.imgur.com/2DhmtJ4.jpg" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" />
                <div class="card__header-text">
                  <h3 class="card__title"> <?php echo $doc->doctor ?></h3>            
                  <span class="card__status"><?php  echo $doc->universidad?></span>
                </div>
              </div>
              <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
            </div>
          </a>      
        </li>

    <?php
}
    ?>




   
         
          </a>      
        </li>
     
      


      <br>
 

</div>
<center><a href="../registro_doctor.php"><button type="button" class="btn btn-primary btn-lg">Registrar Doctor</button></a></center>

</body>
</html>