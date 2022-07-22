<?php
if($_POST){
$conexion = mysqli_connect("localhost","root","","proyecto");
$user = $_POST['nom_user'];
$passwd = $_POST ['passwd'];
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

}
?>