<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Santa Teresita</title>
    <link rel="stylesheet" href="bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
    <style>
     .fonts{
    font-size: 17px;
  }

/* BASIC */



body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: rgba(255, 255, 255, 0.344);
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: rgba(255, 255, 255, 0.344);
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

   
    </style>

  </head>
  <body>
    <!--fondo-->
    <canvas class="orb-canvas" width="313" height="781" style="touch-action: none; cursor: inherit;"></canvas>
     
<div class="container py-3">


  <!--Barra de navegacion -->

  <nav class="navbar navbar-expand-lg barra sticky-top" style="background-color: rgba(255, 255, 255, 0.344);" >
    <div class=" container-fluid">
      <a class="navbar-brand" href="index.php"><img src="bootstrap/img/logo.png" style="width: 30%;"/> &ensp; Santa Teresita</a>
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarColor03" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <center>
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
        </center> &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
        </ul>

      </div>
    </div>
  </nav>
 
  
 
  <br>


    <!--Contenido de la pagina-->
  <main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    

      
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Registrarme -->
        <div id="formFooter" style="border-radius: 10px 10px 0px 0px;">
          <a class="underlineHover" href="#">Registrarme</a>
        </div>

        <div class="fadeIn first">
          <img src="https://img.icons8.com/external-kmg-design-flat-kmg-design/344/external-user-back-to-school-kmg-design-flat-kmg-design.png" id="icon" alt="User Icon" />
        </div>
    
        <!-- Login Form -->
        <form action="" method="post">
          
          
        <input type="text" class="form-control" placeholder="Correo Electronico" aria-label="Correo Electronico" name="correo">
          <br><br>
          <input style="border-radius:5px; width:85%; height:60px; margin:auto;"
          type="password" id="password" class="form-control  text-center" name="login" placeholder="Contraseña" name="passwd">
          <br>

          <b><p>Seleccione su tipo de usuario</p></b>
          <select class="sombras" aria-label="Default select example" name="select" method="post">
            <option class="sombras" value="1" name="cliente" method="post">Cliente</option>
            <option class="sombras" value="2" name="admin" method="post">Administrador</option>
            <option class="sombras" value="3" name="doc" method="post">Doctor</option>
          </select>

          <br><br>
          <input type="submit" class="fadeIn fourth" value="Iniciar Sesion" name="login">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="#">Olvide Contraseña?</a>
        </div>
    
        
        
      </div>
    </div>


</div>
</main>

 
  </div>    
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="bootstrap/js/background.js"></script>

  
  </body>
</html>
<?php
if (isset ($_POST['login']))
{
include('conexion.php');
$TIPO1 = $_POST ['cliente'];
$TIPO2 = $_POST ['admin'];
$TIPO3 = $_POST ['doc'];
$USER =$_POST ['correo'];
$PASSWD = $_POST ['passwd'];
$SELECT = $_POST ['select'];
if ($SELECT== $TIPO1 )
{  
$consulta="select * from clientes WHERE user_cliente='$USER'and contrasena='$PASSWD'";
$resultado=mysql_query($conexion, $consulta);
$filas=mysql_num_rows($resultado);
if($filas>0)
{
  header ("location:index.html");
}
else 
{
echo "Error en la autentificacion";
}
}
else if($SELECT == $TIPO2)  
{  
$consulta="select * from usuarios where usuario='$USER' and contrasena ='$PASSWD'";
$resultado=mysql_query($conexion, $consulta);
$filas=mysql_num_rows($resultado);
if ($filas>0)
{
header ("location:admin/index.html");
}
else 
{
  echo "Error en la autentificacion";
}
}
else if($SELECT == $TIPO3)
{
  $consulta="select * from usuarios where usuario='$USER' and contrasena ='$PASSWD'";
  $resultado=mysql_query($conexion, $consulta);
  $filas=mysql_num_rows($resultado);
  if ($filas>0)
  {
  header ("location:doctor/doc.html");
  }
  else 
  {
    echo "Error en la autentificacion";
  }
} 
}

?>
