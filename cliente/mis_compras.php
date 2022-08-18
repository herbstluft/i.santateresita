<?php 

use MyApp\query\Select;
require("../vendor/autoload.php");

$query = new Select();

$cadena = "SELECT * from productos";
//Ejecutar consulta
$productos = $query->seleccionar($cadena);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis compras</title>
    <link rel="stylesheet" href="../bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.rtl.min.css">
</head>
<body>
    
<div class="container">
    
<?php foreach($productos as $prod){ ?>
<h6> <?php echo $prod-> </h6>

?>


</div>
</body>
</html>