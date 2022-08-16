<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("../vendor/autoload.php");

$data = new Database();
$query = new Select();
$ejecuta = new ejecuta();
session_start();

$rr=0;


if (isset($_GET['agregar']) ){
  //comprobar si existe un producto
    $consulta="select * from detalle_orden where detalle_orden.cliente='".$_SESSION['cliente']."' and 
    detalle_orden.id_producto='".$_GET['agregar']."'";
    $res=$query->seleccionar($consulta);

if ($rr==0)
{
  
    $DateAndTime = date('Y-m-d h:i:s a', time()); 
    echo "$DateAndTime.";

    
    $fecha = "INSERT INTO orden (`id_orden`, `tiempo`) VALUES (NULL ,'$DateAndTime')";
    $f=$ejecuta->ejecutar($fecha);
    $q = "SELECT * FROM orden where orden.tiempo ='$DateAndTime'";
    $resi = $query->seleccionar($q);
    foreach ($resi as $sam)
    $or = $sam->id_orden;

  

}

$rr = 1;


if(empty($res)){

    //insertando producto al carro
    $add_producto ="insert into detalle_orden (id_producto,cantidad, cliente,estatus, id_orden) values ('".$_GET['agregar']."',1, '".$_SESSION['cliente']."',0, '$or')";
    $ejecuta->ejecutar($add_producto);
    header("location: index_carrito.php");
  }
 
// Si el produco existe aumenta la cantidad
  else{
    include '../src/data/conexion_sqli.php';
    $consult="select * from detalle_orden where detalle_orden.cliente='".$_SESSION['cliente']."' and 
    detalle_orden.id_producto='".$_GET['agregar']."'";
    $resultados=mysqli_query($conexion,$consult);
    $num=mysqli_num_rows($resultados);

    $fila=mysqli_fetch_array($resultados);
    $cantidad=$fila['cantidad'];
    $sum=$cantidad+1;
    $sql="update detalle_orden set cantidad='".$sum."' where cliente='".$_SESSION['cliente']."' and id_producto='".$_GET['agregar']."' and estatus=0";
    mysqli_query($conexion,$sql);
  }    
}

//condicion de producto existente
///////////////////////////////////

//Regenerar Carrito
if(isset($_GET['regenerarcarrito'])){
  $rr=0;
  $del="DELETE from detalle_orden where cliente='".$_SESSION['cliente']."' and estatus=0";
  $ejecuta->ejecutar($del);
  }

//Borrar producto del carrito
    if(isset($_GET['id']))
    {
      $sql="delete from detalle_orden where id_producto=".$_GET['id']."";
      $ejecuta->ejecutar($sql);
      
      header("location: index_carrito.php");
    }




?>



<?php 
if(isset($_SESSION['cliente'])){
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
    

   
  <div class="fullscreen-container">
    <video loop muted autoplay poster="dist/img/office.jpg" class="fullscreen-video">
        <source src="https://player.vimeo.com/external/641767478.hd.mp4?s=d1e3f6e09192708d3ac42cc85979c361242f11f5&profile_id=174&oauth_token_id=1027659655" type="video/mp4">

    </video>
</div>
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
          <center>
            <b>
          <li class="nav-item i">
            <a class="nav-link active fonts" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/categorias.php">Categorias</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../citas_index_citas.php">Cita</a>
          </li>
          <li class="nav-item i">
            <a class="nav-link fonts" href="../cliente/nosotros.php">Nosotros</a>
          </li>
          </b>
        </center> &ensp; &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  &ensp; &ensp; &ensp; &ensp;  &ensp; &ensp;
        </ul>
        <form class="d-flex" role="search">
          <br><br>
          
          <?php
          if(isset($_SESSION['cliente'])){

          }
          else{
          ?>
          <button class="btn sombras iniciar" type="submit">
            <a class="a" href="login.php">  Iniciar Session   </a></button>
          
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

      <br> <?php echo $_SESSION['cliente'] ?>





      <center><h1>Carrito</h1></center>
      <br>

<div class="sombras, tabcar">
      <table class="table">
        <thead  class="text-center">
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        
        <?php
        $sql="SELECT todo.nom as Producto, todo.precio, todo.cantidad, todo.subtotal as subtotal, todo.id from (select productos.nom_producto as nom, productos.precio as precio, detalle_orden.cantidad as cantidad, (productos.precio * detalle_orden.cantidad) as subtotal, productos.id_producto as id from detalle_orden inner join productos on productos.id_producto=detalle_orden.id_producto where detalle_orden.cliente='".$_SESSION['cliente']."') as todo";

        //ejecutar consulta
        $resultados=$query->seleccionar($sql);
        //convirtiendo en array  ?>
        
        <?php foreach($resultados as $producto) { ?>

              <tr>
        <td  class="text-center"> <?php echo $producto->Producto?></td>
        <td  class="text-center"> <?php echo "$".number_format($producto->precio,2,'.','.')?></td>
        <td  class="text-center"> <?php 
        echo  $producto->cantidad?></td>    
        <td  class="text-center"> <?php echo "$".number_format($producto->subtotal,2, '.','.')?></td>

        <!--METODO GET: envia el id sacado de la consulta mediante la URL-->
        <td class="text-center"><a href="index_carrito.php?id=<?php echo $producto->id ?>" class="btn btn-danger"><i class="glyphicon glyphicon-menu-left"></i> Borrar</a></td>
         

                    </tr>
          
              <?php  } ?>
          
           
        </tbody>
        <tfoot>
        <tr class="text-center">
            <td><a href="../index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> < Continue Comprando</a></td>
            <td></td>

            <?php
            //hacer aparecer o no el boton del ticket
              if(!empty($resultados)){
            ?>
            <td><a href="index_carrito.php?regenerarcarrito=1" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Regenerar carrito</a></td>

            <?php
              }
            ?>
            
            <td></td>


            <?php

            //hacer aparecer o no el boton del ticket
              if(!empty($resultados)){
            ?>
         
            <td><a href="ticketpdf.php?gen_orden" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Generar ticket ></a></td>
           
            <?php
              }
            ?>
            
            
        </tr>
    </tfoot>
    </table>
    </div>


  </main>

 

</div>
<!--Boton flotante -->
<div class="conta">
    <div class="boton">
      <input type="checkbox" id="btn-mas">
      <div class="redes">
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/facebook-new.png"/></a>
          <a href="#"><img src="https://img.icons8.com/material-outlined/25/FFFFFF/whatsapp--v1.png"/></a>
          <a href="../cliente/buscar/index_buscar.php"><img src="https://img.icons8.com/ios-glyphs/25/FFFFFF/search--v1.png"/></a>
        </div>

        <div class=" btn-mas">
          <label for="btn-mas" class="fa fa-plus"></label>
        </div>



    </div>
 
  </div>    
<!-- Fin del boton flotante -->


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
