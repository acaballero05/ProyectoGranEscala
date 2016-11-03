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

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

</head>
<body>
<?php

// Conectando, seleccionando la base de datos
session_start();
$mysqli = new mysqli("localhost", "root", "", "canchas");
$var=$_SESSION['id'];
$resultado = $mysqli->query( "SELECT * FROM reserva2 where id_sitio='$var'");
if ($_SESSION){
echo '


<!-- Begin Wrapper -->
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
    <li><a href="cerrar.php"> Cerrar Sesión</a></li>
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
        <li><h1>Reserva</h1></li>
        <li>
          <label for="lugar"><p>Lista de reservas:</p></label>
          <table> 
            <tr>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Hora</th>    
              <th>Cancha</th>
              <th>Numero</th>
            </tr>';
          for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $resultado->data_seek($num_fila);
              $fila = $resultado->fetch_assoc();

              $var= $fila['id_cliente'];
              $resultado1 = $mysqli->query( "SELECT * FROM cliente2 where id='$var'");
              $fila1 = $resultado1->fetch_assoc();
              if($fila['fecha']>=(string) date("Y/m/d") and $fila['estado']!='si'){
                echo '<div class="contact_form">';
                echo '<tr><th>'.$fila1['cc'].'</th>';
                echo '<span class="form_hint">'.$fila1['nombre'].'</span> ';
                echo '</div>';
                echo '<th>'.$fila['fecha'].'</th>
                      <th>'.$fila['hora'].'</th>';  



                $var=$_SESSION['id'];
                $resultado2 = $mysqli->query( "SELECT * FROM cancha where id_sitio='$var'");
                $fila2 = $resultado2->fetch_assoc();
                echo '<th>'.$fila2['numero'].'</th>';
                echo '<th>'.$fila['id'].'</th></tr>';
              }
              

          }
        echo '</table>
        </li>
        <li>
          <label for="lugar"><p>Realizar reserva:</p></label>
          <form action="reservar-admin.php"> 
          <button class="submit" type="submit" >Agregar</button>
          </form>
        </li>
        <li>
          <label for="lugar"><p>Cancelar reserva:</p></label>
          <form action="eliminar-admin.php"> 
          <button class="submit" type="submit" >Eliminar</button>
          </form>
        </li>
        <li>
          <label for="lugar"><p>Confirmar reserva:</p></label>
          <form action="confirmar-admin.php"> 
          <button class="submit" type="submit" >Confirmar</button>
          </form>
        </li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <!-- End Right Column -->
  <div class="clear"></div>
  <div id="footer"> &copy; Copyright 2015 by Javier Mogollón & Alejandro Caballero</a><br />
    </div>
</div>
<!-- End Wrapper -->


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