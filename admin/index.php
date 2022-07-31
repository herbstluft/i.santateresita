

<?php
include('conexion.php');
session_start();

if($_POST){

  print_r($_POST);
  $nom=$_POST['nom'];
  $imagen=$_FILES['imagen']['name'];
  $precio=$_POST['precio'];
  $fecha=$_POST['fecha_v'];
  $formula=$_POST['formula'];
  $categoria=$_POST['categoria'];
  $desc=$_POST['desc'];



  
  $imagen=$_FILES['imagen']['name'];
  /////////
  $imagen_temporal=$_FILES['imagen']['tmp_name'];
  move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

  $obj= new conexion();
  $sql="INSERT INTO `productos` (`nom_producto`,`imagen`,`precio`,`fecha_vencimiento`,`id_cat`,`formula`,`descripcion`) VALUES ('$nom','$imagen','$precio','$fecha','$categoria','$formula','$desc')";
  $obj->ejecutar($sql);
}

if($_GET){
  $id=$_GET['borrar'];
  $obj= new conexion();
 
  //borrar_imageen
  $imagen=$obj->consultar("SELECT imagen FROM `productos` where id_producto=".$id);
  unlink("imagenes/".$imagen[0]['imagen']);
  //borrar producto
  $sql="DELETE FROM productos WHERE `productos`.`id_producto` =".$id;
  $obj->ejecutar($sql);
  
}
$obj= new conexion();
$productos=$obj->consultar("SELECT * FROM `productos`");



?>




<?php
if(isset($_SESSION['admin'])){
  
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
        if(isset($_SESSION['admin'])){
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
  </div>
  
<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="dist/img/office.jpg" class="fullscreen-video">
        <source src="https://player.vimeo.com/external/641767478.hd.mp4?s=d1e3f6e09192708d3ac42cc85979c361242f11f5&profile_id=174&oauth_token_id=1027659655" type="video/mp4">

    </video>
</div>
<!-- fin de video -->

<br>


  <!--Contenido de la pagina-->
<div class="container">

  <div class="sombras" style="padding:4% ;">
    <div class="card-header ">
      <center><h2>Datos del producto</h2></center>
    </div>
    <div class="card-body ">

      <form action="index.php" method="post" enctype="multipart/form-data">
        Nombre: 
        <input class="form-control" type="text" name="nom" required><br>
        Imagen:
        <input class="form-control" type="file" name="imagen" required>
        Precio:
        <input class="form-control" type="number" name="precio" required>
        Fecha Vencimiento;
        <input class="form-control" type="date" name="fecha_v"> 
        Formula:
        <input class="form-control" type="text" name="formula">
        Categoria:
        <select class="form-select" aria-label="Default select example" name="categoria" required>
          
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
        <input class="form-control" type="text" name="desc" minlength="20" maxlength="50" required>
        <br>
        <button class="btn sombras registrarme" type="submit" id="registrarme" name="enviar" style="font-size:25px;">Publicar</button>

    </form>
    </div>
    
  </div>
  
    <br><br>
  <table class="sombras table table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Fecha Vencimiento</th>
        <th>Formula</th>
        <th>Categoria</th>
        <th>Descripcion</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($productos as $producto) { ?>
      <tr> 
        <td> <?php echo $producto['id_producto'];?> </td>
        <td> <?php echo $producto['nom_producto'];?> </td>

        <td> 
        <img src="imagenes/<?php echo $producto['imagen'];?>" width="60%">
        </td>


        <td> <?php echo "$".$producto['precio'];?></td>
        <td> <?php echo $producto['fecha_vencimiento'];?></td>
        <td> <?php echo $producto['formula'];?> </td>
        <td> <?php echo $producto['id_cat'];?></td>
        <td> <?php echo $producto['descripcion'];?></td>
        <td> <a class="btn btn-danger" href="?borrar=<?php echo $producto['id_producto']; ?>" >Eliminar</a> </td>
      <tr>
      <?php  } ?>
    </tbody>
  </table>
  



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