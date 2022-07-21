<?php
 include_once 'user_session.php';

 $nom_usuario = new UserSession;
 $nom_usuario->closeSession();

 //Ruta a donde rederigira al cerrar sesion
 header("Location: registro/login.php");

?>