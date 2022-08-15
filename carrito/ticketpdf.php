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
<html>

<head>

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
        }

        td.precio {
            text-align: right;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ticket centrado">
        <h1>FARMACIA SANTA TERESITA</h1>
        <h2>Ticket de venta #1</h2>
        <h2>2022-07-28 00:10:46</h2>
        <?php
        # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
        # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/

        $productos = "SELECT todo.nom as Producto, todo.precio, todo.cantidad, todo.total as subtotal from  
        (select productos.nom_producto as nom, productos.precio as precio, detalle_orden.cantidad as cantidad, (productos.precio * detalle_orden.cantidad) as total from detalle_orden inner JOIN orden on orden.detalle=orden.detalle 
        inner join productos on productos.id_producto=detalle_orden.id_producto where detalle_orden.cliente='juanii')as  todo";
        $resultado = $query->seleccionar($productos);
        ?>

        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                foreach ($resultado as $producto) {
                   
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $producto->cantidad ?></td>
                        <td class="producto"><?php echo $producto->Producto ?></td>
                        <td class="precio">$<?php echo $producto->precio ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tr>
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
                <td class="precio">
                    $<?php echo $totalito->TOTAL?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
    </div>
</body>

</html>