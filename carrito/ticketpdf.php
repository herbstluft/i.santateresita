<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;


require("../vendor/autoload.php");
$query = new Select();
$ejecuta = new Ejecuta();
$medidaTicket = 180;
session_start();


?>
<!DOCTYPE html>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">
<html>


<head>

    <style>
     .ticket{
        margin:auto;
        
        width: 80%;
     }
     table{
       
        margin:auto;
        width: 100%;
    }
 

    </style>
</head>

<body>
    <div class="ticket centrado table">
        <center>
            <img src="../bootstrap/img/logo.png" alt="">
        </center>
        <?php //imprimir hora actual
//$DateAndTime = date('m-d-Y h:i:s a', time());  
//echo " $DateAndTime.";
?>
       
        <?php
        # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
        # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/

        $productos = "SELECT todo.nom as Producto, todo.precio, todo.orden,todo.cantidad, todo.total as subtotal from  
        (select productos.nom_producto as nom, productos.precio as precio, orden.id_orden as orden, detalle_orden.cantidad as cantidad, (productos.precio * detalle_orden.cantidad) as total from detalle_orden inner JOIN orden on orden.detalle=orden.detalle 
        inner join productos on productos.id_producto=detalle_orden.id_producto where detalle_orden.cliente='juanii')as  todo";
        $resultado = $query->seleccionar($productos);
        


        //Nombre del cliente
        $consulta="SELECT clientes_datos_personales.nombre as nombre,clientes_datos_personales.apellido_pat as app,
        clientes_datos_personales.apellido_mat as apm
         from clientes_datos_personales inner join clientes on clientes.id_reg=clientes_datos_personales.id_cliente
         where clientes.user_clien='juanii'";
        $id=$query -> seleccionar($consulta);

        //convirtiendo el nombre en array y concadenandolo
        foreach($id as $res)
      $nombre_cliente= $res->nombre ." ". $res->app ." ". $res->apm;

      foreach($resultado as $ord)
  

        ?>



<p> <b> Orden: #</b><?php echo $ord->orden?></p>
<p> <b> Cliente: </b> <?php echo $nombre_cliente?></p>
        <h2>2022-07-28 00:10:46</h2>
        <table>
            <thead>
                
                <tr class="text-center">
                    <th class="cantidad">Cantidad</th>
                    <th class="producto">Producto</th>
                    <th class="precio">Precio Unitario</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                
                
                foreach ($resultado as $producto) {
                   
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $producto->cantidad ?></td>
                        <td class="producto"><?php echo $producto->Producto ?></td>
                        <td class="precio"><?php echo "$".number_format($producto->precio,2,'.','.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            
            <tr class="text-center" style="background-color: yellow;">
            
                <?php 
                $total = "SELECT SUM(SAM.total)as TOTAL FROM(SELECT todo.nom as Producto, todo.precio, todo.cantidad, todo.total from  
                (select productos.nom_producto as nom, productos.precio as precio, detalle_orden.cantidad as cantidad, 
                (productos.precio * detalle_orden.cantidad) as total from detalle_orden inner JOIN orden 
                on orden.detalle=orden.detalle inner join productos on productos.id_producto=detalle_orden.id_producto 
                where detalle_orden.cliente='juanii')as todo)as SAM;";
                $totalx = $query->seleccionar($total);
                foreach ($totalx as $totalito) {
                ?>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio ">
                    <?php echo "$".number_format($totalito->TOTAL,2,'.','.')?>
                </td>
            </tr>
            <?php } ?>
        </table>


        <br><br>
        <h3 class="text-center">¡GRACIAS POR SU COMPRA!</h3>
    </div>



    
</body>

</html>

        <?php
echo header("Refresh:1 Location: index_carrito.php");
        ?>