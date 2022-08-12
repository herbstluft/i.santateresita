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
      <a class="navbar-brand" href="index.php"><img src="../bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarColor03" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <center>
            <b>
          <li class="nav-item i">
            <a class="nav-link active fonts" aria-current="page" href="index.php">Inicio</a>
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
          
          <button class="btn sombras iniciar" type="submit">
            <a class="a" href="login.php">  Iniciar Session   </a></button>
        </form>
      </div>
    </div>
  </nav>
 
  
 
  <br>


    <!--Contenido de la pagina-->

    <div class="sombras"> <!--Inicio-->
      <br>
      <center><h1>Carrito</h1></center>
      <br>

<div class="sombras, tabcar">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
            <tr><td colspan="5"><p>Tu carrito esta vacio.....</p></td>
           
        </tbody>
        <tfoot>
        <tr>
            <td><a href="../index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> < Continue Comprando</a></td>
            <td colspan="2"></td>
           
            <td class="text-center"><strong></strong></td>
           
            
        </tr>
    </tfoot>
    </table>
    </div>

  </main>

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
