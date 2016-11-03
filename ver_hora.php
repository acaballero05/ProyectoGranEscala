
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
  <!-- Begin Right Column -->
  <div id="maincolumn">
    <div class="lista">
      <ul>
        <li><h1>Horas Disponibles</h1></li>
        <li>
          <label for="lugar"><p>Lista de reservas:</p></label>
          <table> 
            <tr>
              <th>Hora</th>
              <th>Estado</th>
            </tr>
            <?php
        			// Conectando, seleccionando la base de datos
        			$mysqli = new mysqli("localhost", "root", "", "canchas");
        			$lugar = $_POST['lugar'];
              $fecha = $_POST['datepicker'];
              $cancha = $_POST['cancha'];
        			$resultado = $mysqli->query( "SELECT * FROM reserva2 where id_sitio='$lugar' and fecha='$fecha'  ");
              $lista=['9:00 a.m.','10:00 a.m.','11:00 a.m.','12:00 m','1:00 pm',  '2:00 pm ','3:00 pm','4:00 pm','5:00 pm', '6:00 pm',  '7:00 pm 
            ',    '8:00 pm ',
     '9:00 pm 
            ',       '10:00 pm ',
       '11:00 pm '];
                for ($cont = 0; $cont < $resultado->num_rows; $cont++) {
                    $resultado->data_seek($cont);
                    $fila = $resultado->fetch_assoc();
                    echo '<tr><th>'.$fila['hora'].'</th>';   
                    echo '<th>Ocupado</th></tr>';           

                    }
                  
          ?>
        </table>
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




</body>
</html>