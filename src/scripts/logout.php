<?php
session_start();
session_destroy();

 //Ruta a donde rederigira al cerrar sesion
 header("Location: login.php");

?>