<?php 

            
          use MyApp\data\Database;
          use MyApp\query\ejecuta;
          use MyApp\query\Select;
          

          require("../../vendor/autoload.php");

          $query = new Select();
          $insert = new ejecuta();

          if($_POST){

          extract($_POST);

          $rep="SELECT * from clientes WHERE clientes.user_clien='$nom_us'";
          $re=$query->seleccionar($rep);

          if(empty($re)){
            $insert_reg="INSERT INTO clientes_datos_personales (nombre, apellido_pat, apellido_mat, correo, edad, genero, telefono, RFC) VALUES ('$nom', '$ap', '$am', '$corr', '$edad', '$gen', '$tel', '$rfc')";
            $insert  -> ejecutar($insert_reg);
  
            //obtener el id del cliente
            $cadena="select clientes_datos_personales.id_cliente as id from clientes_datos_personales WHERE clientes_datos_personales.nombre='$nom'";
  
            $id=$query -> seleccionar($cadena);
  
            echo $cadena;
            
            foreach ($id as $i)
            $id_reg= $i->id;
    
            $insert_clientes="INSERT INTO clientes (user_clien, contrasena, id_reg,t_us) VALUES ('$nom_us','$us_cont','$id_reg','3')";
            $insert -> ejecutar($insert_clientes);
          
        
              
  


          echo "<div class='alert alert-success'> Cliente Registrado </div>";
          /*Registro exitoso y despues se dirige a la pagina principal*/
   
          }
          else{
            echo "<div class='alert alert-success'> Este nombre de usuario ya existe </div>";
          }
        }
        ?>