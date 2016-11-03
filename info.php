<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | CANCHAS</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>


<script>
    function abrir_dialog(h) {
      $( h ).dialog({
          show: "blind",
          hide: "explode"
      });
    };
</script>

</head>
<body>
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
      <li><a href="administrar.html">Administrar</a></li>
    </ul>
  </div>
  <!-- End Navigation -->
  <!-- Begin Left Column -->
  <div id="leftcolumn">
    <div id="navigation">
      <ul>
        <li><a href="index.html">> INICIO</a></li>
        <li><a href="reserva.php">> HACER RESERVA</a></li>
        <li><a href="hora.php">> HORARIOS</a></li>
        <li><a href="info.php">> CANCHAS</a></li>

      </ul>
    </div>
    
  </div>
  <!-- End Left Column -->
  <!-- Begin Main Column -->
  <div id="maincolumn">


    <div class="lista">
      <ul>
        <li><h1>Canchas</h1></li>
        
           <?php
              $mysqli = new mysqli("localhost", "root", "", "canchas");
              $resultado = $mysqli->query( "SELECT * FROM sitio");
              for ($cont=0; $resultado->num_rows > $cont; $cont++) {
                $resultado->data_seek($cont);
                $fila = $resultado->fetch_assoc(); 
                  echo '<li><label for="lugar"><p>'.$fila['nombre'].': </p></label>';
                  echo '<button onclick="abrir_dialog('.$fila['nombre'].')">Mostrar información</button></li>';
                  echo '<div id='.$fila['nombre'].' title='.$fila['nombre'].' style="display:none;">';
                  echo  '<p>Nos encontramos ubicado en: '.$fila['direccion'].'</p>';
                  $var=$fila['id'];
                  $resultado2 = $mysqli->query( "SELECT * FROM cancha where id_sitio='$var' ");
                  echo  '<p>Los precios de nuestras canchas son: </p>';
                  for ($cont2=0; $resultado2->num_rows > $cont2; $cont2++) {
                    $resultado2->data_seek($cont2);
                    $fila2 = $resultado2->fetch_assoc(); 
                    echo  '<p>Cancha '.$fila2['numero'].': '.$fila2['precio'].' </p>';
                  }
                  echo '</div>';
              }
              mysqli_close($mysqli);
              ?>
          
          
        
      </ul>
    </div>
    <!-- End Main Column -->
  </div>
    <div class="clear"></div>
    <div id="footer"> &copy; Copyright 2015 by Javier Mogollón & Alejandro Caballero</a><br />
    </div>
  </div>
<!-- End Wrapper -->
