<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | EDITAR</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">
</head>
<body>
<?php

// Conectando, seleccionando la base de datos
$mysqli = new mysqli("localhost", "root", "", "canchas");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$cancha = $_POST['cancha'];
$precio = $_POST['precio'];
$disp = $_POST['disp'];

$mysqli->query( "UPDATE sitio SET nombre='$nombre' telefono='$telefono' WHERE id=1 ");
$mysqli->uery( "UPDATE cancha SET precio='$precio' disp='$disp' WHERE numero=$cancha and id=1  ");
$mysqli->commit();
   

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
    </ul>
  </div>
  <!-- End Navigation -->
  <!-- Begin Left Column -->
  <div id="leftcolumn">
    <div id="navigation">
      <ul>
        <li><a href="reserva-admin.html">> RESERVAS</a></li>
        <li><a href="cliente-admin.html">> CLIENTES</a></li>
        <li><a href="ganancia-admin.html">> GANANCIAS</a></li>
        <li><a href="facturar-admin.html">> FACTURAR</a></li>
        <li><a href="editar-admin.html">> EDITAR </a></li>
      </ul>
    </div>
    
  </div>
  <!-- End Left Column -->
  <!-- Begin Right Column -->
  <div id="maincolumn">
    <form class="contact_form" action="#" id="formulario_reserva" > 
      <div>
        <ul> 
          <li> 
            <h1>Editar </h1> 
          </li> 
          <li> 
            <label for="name"><p>Nombre:</p></label> 
            <input type="text"  id="nombre" required /> 
          </li>  
          <li> 
            <label for="cc"><p>Telefono:</p></label> 
            <input type="text" id="telefono" required /> 
          </li> 
          <li> 
            <label for="cc"><p>Cancha:</p></label>
            <select id="cancha" style="width:260px; height:34px; margin-left:1px" >
              <option name=one value=uno selected> Cancha 1 </option>
              <option name=two value=dos> Cancha 2 </option>
              <option name=three value=tres > Cancha 3 </option>
              <option name=four value=cuatro> Cancha 4 </option>
            </select>
          </li> 
          <li> 
            <label for="cc"><p>Precio:</p></label> 
            <input type="text" id="precio" required /> 
          </li> 
          <li> 
            <label for="cc"><p>Disponibilidad:</p></label> 
            <select id="disp" style="width:260px; height:34px; margin-left:1px" >
              <option name=one value=uno selected> Disponible </option>
              <option name=two value=dos> No disponible </option>
            </select>
          </li> 
          <li> 
            <button class="submit" type="submit">Guardar cambios</button> 
          </li> 
        </ul> 
      </div> 
    </form>
    <div class="clear"></div>
  </div>
  <!-- End Right Column -->
  <div class="clear"></div>
  <div id="footer"> &copy; Copyright 2015 by Javier Mogollón & Alejandro Caballero</a><br />
    </div>
</div>
<!-- End Wrapper -->
';
// Cerrar la conexión
mysqli_close($mysqli);
?>
</body>
</html>