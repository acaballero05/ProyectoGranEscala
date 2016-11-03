<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | RESERVA</title>
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

// Conectando, seleccionando la base de datos
$mysqli = new mysqli("localhost", "root", "", "canchas");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$resultado = $mysqli->query( "SELECT * FROM sitio WHERE user = '$usuario' and pass='$password'");
$resultado->data_seek($resultado->num_rows - 1);
$fila = $resultado->fetch_assoc();

session_start();


if($resultado->num_rows == 1){
  
  $_SESSION['id']=$fila['id'];
  $_SESSION['nombre']=$fila['nombre'];
  header('Location: reserva-admin.php');


}
else{

 echo '<script languaje=javascript>
              jAlert("Datos incorrectos, por favor verifique nuevamente.", "Error",function(){ window.history.back(-1); });
              </script>';
 ;
}
// Cerrar la conexión
mysqli_close($mysqli);
?>
</body>
</html>