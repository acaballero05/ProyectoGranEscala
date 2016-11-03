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

$id = (int) $_POST['id'];
$estado = $_POST['estado'];

$resultado = $mysqli->query( "SELECT * FROM reserva2 where id='$id'; ");
$fila2 = $resultado->fetch_assoc();
$var=$fila2['id_cancha'];
$resultado2 = $mysqli->query( "SELECT * FROM cancha where id='$var'; ");
$fila = $resultado2->fetch_assoc();

$var2=$fila2['fecha'];
$var3=$fila2['hora'];
$var4=$fila['precio'];
$var5=$fila2['id_cliente'];
$var6=$fila2['id_cancha'];
$var7=$fila2['id_sitio'];

$mysqli->query("INSERT INTO confirmada (fecha,hora,precio,pago,id_cliente,id_cancha,id_sitio) VALUES ('$var2','$var3','$var4','$estado','$var5','$var6','$var7');");
$mysqli->query("UPDATE reserva2 SET estado='si'where id='$id';");
echo '<script languaje=javascript>
              jAlert("Se ha confirmado la reserva correctamente", "Mensaje",function(){ window.location="reserva-admin.php";});
              </script>';
 ;
// Cerrar la conexión
mysqli_close($mysqli);
?>
</body>
</html>