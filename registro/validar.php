<?php

$conexion = mysqli_connect("localhost","root","admin","proyecto2");

$consulta="select * from usuarios where usuario='$user' and contrasena='$passwd'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0)
{
  header("location:../index.php");
} else 
{
echo "error en la autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>