
<?php
include('../admin/conexion.php');
session_start();

$obj= new conexion();
$citas=$obj->consultar("SELECT todo.Nombre, todo.Ap_Pat, todo.Ap_Mat, todo.Correo, todo.Edad, todo.Genero, todo.Telefono, 
todo.RFC,todo.hora, todo.fecha, todo.id_cita from (select clientes_datos_personales.nombre as Nombre,clientes_datos_personales.apellido_pat as Ap_Pat,
clientes_datos_personales.apellido_mat as Ap_Mat, clientes_datos_personales.correo as Correo, clientes_datos_personales.edad as Edad,
clientes_datos_personales.genero as Genero, clientes_datos_personales.telefono as Telefono, clientes_datos_personales.RFC as RFC,
usuarios.usuario as usuario, citas.hora as hora, citas.fecha as fecha,citas.id_cita as id_cita from citas inner JOIN clientes on clientes.id_client=citas.id_cliente
inner JOIN clientes_datos_personales on clientes_datos_personales.id_cliente=clientes.id_reg inner join doctores on
citas.id_doc=doctores.id_doc inner JOIN usuarios on doctores.id_usuarios=usuarios.id_usuario) as todo
where todo.usuario='$_SESSION[doctor]';");
?>



<?php
if(isset($_SESSION['doctor'])){ 
  ?>

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
    



<div class="container py-3">


<!--Barra de navegacion -->

<nav class="navbar navbar-expand-lg barra sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand" ><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
    
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
        <?php
        if(isset($_SESSION['doctor'])){
            ?>
              <button class="btn sombras iniciar col-8 " type="submit" style="height: 50px; position: relative; top:30px" name="cerrar_session">
          <a class="a" href="../registro/logout.php">  <?php echo "Cerrar Session" ?> </a></button>
            <?php
            } 
            ?>
      </form>
    </div>
  </div>
</nav>
  <!-- Fondo de video -->
  <div class="fullscreen-container">
    <video loop muted autoplay poster="" class="fullscreen-video">
        <source src="../bootstrap/img/back.mp4" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
  </div>


<br>


  <!--Contenido de la pagina-->
<div class="container">

<div class="row row-cols-1 row-cols-md-12 row-cols-lg-3 mb-3 text-center">
  <?php foreach($citas as $cita) { ?>
      <!--Card-->
      <form method="post">
<div class="col">
      <div class="sombras mb-4 rounded-3 shadow-sm">
        <div class="sombras card-header py-3"">
          <h4 class="my-0 fw-normal"><?php echo $cita['Nombre']?>  <?php echo $cita['Ap_Pat'] ?></h4>
        </div>
        <div class="card-body">
        <br>
        <h6>Edad:  <?php echo $cita['Edad']?> </h6>
        <h6>Genero:  <?php echo $cita['Genero']?> </h6>
        <h6>Telefono:  <?php echo $cita['Telefono']?> </h6>
        <h6>RFC:  <?php echo $cita['RFC']?> </h6>
        <h6>Correo:  <?php echo $cita['Correo']?> </h6>

        <hr>
        <h6>ID:  <?php echo $cita['id_cita']?> </h6>
        <h6>Fecha:  <?php echo $cita['fecha']?> </h6>
        <h6>Hora:  <?php echo $cita['hora']?> </h6>
      

          <div class="d-grid gap-2 d-md-block">
           <form action="index_doctor.php" method="POST">
           
           <a href="?borrar=<?php echo $cita['id_cita']; ?>">
            <button class="btn sombras br_btn" id="registrarme" type="button" name="realizada">
              Realizada
            </button>
            </a>

   
          </form>
            <?php
            if($_GET){

              $id=$_GET['borrar'];
              //borrar registro de cita
              $sql="DELETE FROM citas WHERE `citas`.`id_cita` =".$id;
              $obj->ejecutar($sql);
              header('location:index_doctor.php');
             
            }
            ?>
  
        
      
          </div>
          <br>
        </div>
    </div>
    </form>

    </div>
    <?php  } ?>
    
    
</div>



</div>
  
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="../bootstrap/js/background.js"></script>

</body>
</html>

<?php
}
else{
  header ("Location:../error.php");
}
?>