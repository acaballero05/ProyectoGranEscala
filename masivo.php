<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | FACTURAR</title>
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
if ($_SESSION){
echo '
<div id="wrapper">
  <!-- Begin Header -->
  <div id="header">
    <h1>
      <div class="l1">Alquila tu cancha</div>
    </h1>
  </div>
  <!-- End Header -->
  <!-- Begin Navigation -->
  <div id="navtop">
    <ul>
      <li><a href="administrar.html"> Cerrar Sesión</a></li>
      <li>Usuario: '.$_SESSION['nombre']. '</li>
    </ul>
  </div>
  <!-- End Navigation -->
  <!-- Begin Left Column -->
  <div id="leftcolumn">
    <div id="navigation">
      <ul>
        <li><a href="reserva-admin.php">> RESERVAS</a></li>
        <li><a href="cliente-admin.php">> CLIENTES</a></li>
        <li><a href="ganancia-admin.php">> GANANCIAS</a></li>
        <li><a href="facturar-admin.php">> FACTURAR</a></li>
        <li><a href="editar-admin.php">> EDITAR </a></li>
      </ul>
    </div>
    
  </div>
  <!-- End Left Column -->
  <!-- Begin Right Column -->
  <div id="maincolumn">
  <div class="lista">
      <ul>
        <li><h1>Facturacion</h1></li>';

// Conectando, seleccionando la base de datos
$mysqli = new mysqli("localhost", "root", "", "canchas");

$mes = $_POST['mes'];
$year = $_POST['year'];
$id=$_SESSION['id'];
$resultado = $mysqli->query( "SELECT * FROM confirmada where id_sitio='$id' and pago='no'; ");
$resultado2 = $mysqli->query( "SELECT * FROM cliente2 where id_sitio='$id'; ");
for($cont=0;$cont<$resultado2->num_rows;$cont++){
	$acum=0;
	$resultado2->data_seek($cont);
    $fila2 = $resultado2->fetch_assoc();
    echo 'Nombre: '.$fila2['nombre'].' '.$fila2['apellido'].'<br />';
    echo 'Cedula: '.$fila2['cc'].'<br />';
    for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
	    $resultado->data_seek($num_fila);
	    $fila = $resultado->fetch_assoc();
	    if($mes.'/'.$year==substr($fila['fecha'],3) and $fila['id_cliente']==$fila2['id']){
	    	echo 'Fecha: '.$fila['fecha'].' Hora: '.$fila['hora'].' Precio: '.$fila['precio'].'<br />';
	    	$acum=$acum+(int) $fila['precio'];
		}

	}
	echo 'Total: '.$acum.'<br /><br />';
}


 ;
// Cerrar la conexión
mysqli_close($mysqli);
echo'
<li>


<label for="lugar"><p>Cedula del cliente a pagar deuda:</p></label>
<form  action="masivo_script.php" name="formulario_gana" method="post"  > 
<input type="text" name="cc" id="cc" required />
<button class="submit" type="submit" >Pagar</button>

</form>
</li>
</ul></div>
<div class="clear"></div>
  </div>
  <!-- End Right Column -->
  <div class="clear"></div>
  <div id="footer"> &copy; Copyright 2015 by Javier Mogollón & Alejandro Caballero</a><br />
    </div>
</div>

';
}
else{

 echo '<script languaje=javascript>
              jAlert("No tiene permisos de ingreso.", "Error",function(){ window.location="administrar.html";});
              </script>';
 ;
}
?>
</body>
</html>