<?php 
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");

$query = new Select();
$insert = new ejecuta();

//ocultar warnings


session_start();

?>
        <?php 
if(isset($_SESSION['cliente'])){
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
        
          <b>
          &ensp;  &ensp;
        <li class="nav-item i">
          <a class="nav-link fonts" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link fonts" href="../cliente/categorias.php">Categorias</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link active fonts" href="../citas/index_citas.php">Cita</a>
        </li>
        <li class="nav-item i">
          <a class="nav-link  fonts" href="../cliente/nosotros.php">Nosotros</a>
        </li>
        </b>
      &ensp; &ensp; 
      </ul>
      <form class="d-flex" method="POST" action="nosotros.php" role="search">

      <?php
           if($_SESSION['cliente']){
            ?>
         
            <?php
            } 
            else{
              ?>
               <button class="btn sombras iniciar" id="registrarme" type="submit">
              <a class="a" href="../registro/login.php"  >  Iniciar Session   </a></button>
              <?php
            }
            ?>
      </form>
    </div>
  </div>
</nav>

 
  
 
  <br>


    <!--Contenido de la pagina-->

    <div class="sombras"> <!--Inicio-->
      <br>
      <center><h1>Citas </h1> </center> 
  
      <form class="form1" method="get" action="index_citas.php">
      
          <?php 
            if(isset($_SESSION['cliente'])){
              $consulta="SELECT clientes_datos_personales.nombre as nombre,clientes_datos_personales.apellido_pat as app,
              clientes_datos_personales.apellido_mat as apm
               from clientes_datos_personales inner join clientes on clientes.id_reg=clientes_datos_personales.id_cliente
               where clientes.user_clien='$_SESSION[cliente]'";
              $id=$query -> seleccionar($consulta);
     
              foreach($id as $res)

              $nombre_cliente= $res->nombre ." ". $res->app ." ". $res->apm;
           echo  "<center><h1> Bienvenido $nombre_cliente</h1></center>";

           ?>
          
          
           <br><br>
       
           <h4>Doctor</h4>
          <select class="form-select sombras" aria-label="Disabled select example"  name="doctor">

          <?php 

           $docs = "SELECT doctores.id_doc, datos_pers_user.nombre, datos_pers_user.apellido_pat, datos_pers_user.apellido_mat from datos_pers_user 
           inner join usuarios on usuarios.id_reg = datos_pers_user.id_registro inner join doctores on doctores.id_usuarios = usuarios.id_usuario";

           $iddoc=$query->seleccionar($docs);

              foreach($iddoc as $doc) {

                $idr = $doc->id_doc ?>
            
         
       <option value="<?php echo $idr?>"><?php echo $doc->nombre . " " .$doc->apellido_pat. " " . $doc->apellido_mat?></option>
       <?php }?>
        </select><br>


        <!--Calendarios de citas -->
        <?php
        date_default_timezone_set('America/Mexico_City');
        $fecha_actual=date("Y-m-d   H:i");
        date_default_timezone_set('America/Mexico_City');
        //fecha actual del sistema
        $fe=date("Y-m-d");

        $mod_date = strtotime($fe."+ 50 days");
        $fecha_maxima = date("Y-m-d",$mod_date);

        $hra = date('H:i:s');


        ?>
        <label>Fecha: <br><input type="date" class="sombras" name="fecha" min="<?php echo $fe ?>" max="<?php echo $fecha_maxima?>" required></label><br>
        <label>Hora:</label><br>
        <form action="https://www.anerbarrena.com/demos/2014/002-time-input-html5.php" name="formulario">
	      <input type="time" class="sombras" name="hora"  min="12:00:00"  max="22:00:00" step="1" required>
        
               <!--BOTON DE CITA-->
        <center> <input type="submit" class="fadeIn fourth" value="Generar cita" name="generar"></center>
          <a href="mis_citas.php?iddoctor=<?php echo $idr?>"><button type="button" class="btn" style="background-color: #CC7272; color:white">Ver mi cita</button>
          <br><br>
                                                    
      
      </form>
    </div> <!--Fin-->
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
  header("location: ../registro/login.php");
}
?>




<?php

if(isset($_GET['generar'])){


  if($_GET['hora'] > $hra){


  //confirmar el dia
  $sql="SELECT * from citas WHERE citas.fecha='".$_GET['fecha']."' and realizadas=0";
  $f=$query->seleccionar($sql);
  if(empty($f)){

      $num_citas="SELECT clientes.user_clien as cliente from citas INNER JOIN clientes on clientes.id_client=citas.id_cliente WHERE clientes.user_clien='".$_SESSION['cliente']."' and citas.realizadas=0";
      $res=$query->seleccionar($num_citas);

        if(empty($res)){


          $doctor=$_GET['doctor'];
          $hora=$_GET['hora'];
          $fecha=$_GET['fecha'];
          
          //obtener id del cliente
          $cliente_id="SELECT clientes.id_client from clientes where clientes.user_clien='$_SESSION[cliente]'";
          $id=$query->seleccionar($cliente_id);
          //convertir resultado a entero
            if (!empty($id)) {
                    foreach ($id as $id_cliente) {
                      
                        $insert_cita="INSERT INTO citas (id_cliente,id_doc,hora, fecha, realizadas) VALUES ($id_cliente->id_client,$doctor,'$hora','$fecha',0)";
                        $insert->ejecutar($insert_cita);  
                    } 
                    echo "
                    <style>
                    a{
                      text-decoration:none;
                    }
                    </style>
                    <div class='container'>
                    <div class='alert alert-success' role='alert'>
                    <center> Su cita ha sido generada con exito! </center>
                  </div>
                  <div>
                  ";
            }
          }

      else{
        echo "
        <style>
        a{
          text-decoration:none;
        }
        </style>
        <div class='container'>
        <div class='alert alert-warning' role='alert'>
        <center> Lo sentimos, ya has generado una cita anteriormente! </center>
      </div>
      <div>
      ";
      } 

}

else{
  echo "
        <style>
        a{
          text-decoration:none;
        }
        </style>
        <div class='container'>
        <div class='alert alert-warning' role='alert'>
        <center> Lo sentimos este dia se encuentra ocupado, intenta agendarla otro dia! </center>
      </div>
      <div>
      ";
}
}
else{
  echo "
        <style>
        a{
          text-decoration:none;
        }
        </style>
        <div class='container'>
        <div class='alert alert-warning' role='alert'>
        <center> Lo sentimos esta hora ya ha pasado </center>
      </div>
      <div>
      ";
}



}}
?>