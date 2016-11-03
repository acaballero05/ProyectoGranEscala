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
</head>
<body>
      <?php

// Conectando, seleccionando la base de datos
session_start();
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
    <form class="contact_form" action="agregar_script.php" id="formulario_agregar" method="post"> 
     <div>
        <ul> 
          <li> 
            <h1>Clientes</h1> 
          </li> 
          <li> 
            <label for="name"><p>Nombre:</p></label> 
            <input type="text" name="nombre" id="nombre"  required /> 
          </li>
          <li> 
            <label for="name"><p>Apellido:</p></label> 
            <input type="text" name="apellido" id="apellido" required /> 
          </li> 
          <li> 
            <label for="cc"><p>Cedula:</p></label> 
            <input type="text" name="cc" id="cc" required /> 
          </li> 
          <li> 
            <label for="email"><p>Email:</p></label> 
            <input type="email" placeholder="usuario@ejemplo.com" name="correo" id="correo" required /> 
            <span class="form_hint">Formato correcto: "name@something.com"</span> 
          </li> 
          <li> 
            <label for="telefono"><p>Telefono:</p></label> 
            <input type="text" name="telefono" id="telefono" required /> 
          </li>  
          
          <li> 
            <button class="submit" type="submit">Agregar</button> 
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