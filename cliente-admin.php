<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | CLIENTE</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>

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
$var= $_SESSION['id'];
$resultado = $mysqli->query( "SELECT * FROM cliente2 WHERE id_sitio = '$var'");
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
        <li><h1>Clientes</h1></li>
        <li>
          <label for="lugar"><p>Lista de clientes:</p></label>
          <table> 
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cedula</th>    
              <th>Telefono</th>
              <th>Correo</th>
            </tr>';
          for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $resultado->data_seek($num_fila);
              $fila = $resultado->fetch_assoc();
              echo '<tr><th>'.$fila['nombre'].'</th>
                    <th>'.$fila['apellido'].'</th>
                    <th>'.$fila['cc'].'</th>    
                    <th>'.$fila['telefono'].'</th>
                    <th>'.$fila['correo'].'</th></tr>';
          }
        echo '</table> 
        </li>
        <li>
          <label for="lugar"><p>Agregar nuevo cliente:</p></label>
           <form action="agregar-admin.php"> 
          <button class="submit" type="submit" >Agregar</button>
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
mysqli_close($mysqli);
?>
</body>
</html>