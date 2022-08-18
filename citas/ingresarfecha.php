<?php

include 'index_citas.php';
$conexion= mysqli_connect('localhost','root','1234','proyecto');

if(isset($_GET['generar'])){

$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$consulta="INSERT INTO citas (hora) VALUES('$hora')";
$ejecutar=mysqli_query($conexion,$consulta);
$consulta="INSERT INTO citas (fecha) VALUES('$fecha')";
$ejecutar=mysqli_query($conexion,$consulta);

if($ejecutar)
{
    echo '<script> alert("Fecha ingresada correctamente")</script>';
}
else
{
    echo '<script> alert("Error")</script>';
}

}

?>

