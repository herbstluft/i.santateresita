<?php 

            
          use MyApp\data\Database;
          use MyApp\query\ejecuta;
          use MyApp\query\Select;
          

          require("../../vendor/autoload.php");

          $query = new Select();
          $insert = new ejecuta();

          if($_POST){

          extract($_POST);
          $contrasena= password_hash($us_cont, PASSWORD_DEFAULT);

          $insert_clientes="INSERT INTO clientes (user_clien, contrasena) VALUES ('$nom_us','$contrasena')";
          $insert_reg="INSERT INTO clientes_datos_personales (nombre, apellido_pat, apellido_mat, correo, edad, genero, telefono, RFC) VALUES ('$nom', '$ap', '$am', '$corr', '$edad', '$gen', '$tel', '$rfc')";

          $insert -> ejecutar($insert_clientes);
          $insert  -> ejecutar($insert_reg);


          //obtener el id del cliente
          $cadena="SELECT 
          clientes_datos_personales.id_cliente
          from  clientes_datos_personales, clientes 
          
          WHERE clientes.id_client=clientes_datos_personales.id_cliente and clientes.user_clien='$nom_us'";

          $id=$query -> seleccionar($cadena);



          echo "<div class='alert alert-success'> Cliente Registrado </div>";
          /*Registro exitoso y despues se dirige a la pagina principal*/
          header("refresh:3; ../../registro/login.php");
          }
        ?>