<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | AGREGAR</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script src="css/jquery.js" type="text/javascript"></script>
<script src="css/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="css/jquery.alerts.js" type="text/javascript"></script>
<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />



</head>
<body>

<?php
session_start();
// Conectando, seleccionando la base de datos
$mysqli = new mysqli("localhost", "root", "", "canchas");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$cancha = $_POST['cancha'];
$precio = $_POST['precio'];
$disp = $_POST['disp'];

echo $nombre;
echo $telefono;
echo $cancha;
echo $precio;
echo $disp;

$var = (int) $_SESSION['id'];

$resultado1 = $mysqli->query( "SELECT * FROM cancha where id_sitio='$var'and numero='$cancha'; ");
              $fila2 = $resultado1->fetch_assoc();
$var3=$fila2['id'];

$mysqli->query("UPDATE sitio SET nombre='$nombre', telefono='$telefono' where id='$var';");
$mysqli->query("UPDATE cancha SET precio='$precio', disp='$disp' where id_sitio='$var' and id='$var3';");

echo '<script languaje=javascript>
              jAlert("Se han modificado los datos correctamente.", "Mensaje",function(){ window.location="reserva-admin.php";});
              </script>';
 ;
// Cerrar la conexión
mysqli_close($mysqli);
?>
</body>
</html>