<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | RESERVA</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript">
jQuery(function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
    </script>

</head>
<body>
      <?php

// Conectando, seleccionando la base de datos
session_start();
$mysqli = new mysqli("localhost", "root", "", "canchas");
$var=$_SESSION['id'];
$resultado = $mysqli->query( "SELECT * FROM cancha where id_sitio='$var'");
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
    <form class="contact_form" action="reserva-admin_script.php" id="formulario_reserva" method="post"  > 
     <div>
        <ul> 
          <li> 
            <h1>Reserva</h1> 
          </li> 
          <li> 
            <label for="cc"><p>Cedula:</p></label> 
            <input type="text" name="cc" id="cc" required /> 
          </li>  
          <li> 
            <label for="fecha"><p>Fecha:</p></label>
            <input type="text"  name="datepicker" id="datepicker" readonly="readonly" size="12" />
          </li> 
          <li> 
            <label for="hora"><p>Hora:</p></label>
          
            <select name="hora" id="hora" style="width:260px; height:34px; margin-left:1px">
              <option value="9:00 a.m." selected> 9:00 a.m. </option>
              <option  value="10:00 a.m."> 10:00 a.m. </option>
              <option  value="11:00 a.m."> 11:00 a.m. </option>
              <option  value="12:00 m"> 12:00 m </option>
              <option  value="1:00 pm"> 1:00 pm </option>
              <option  value="2:00 pm"> 2:00 pm </option>
              <option  value="3:00 pm"> 3:00 pm </option>
              <option  value="4:00 pm"> 4:00 pm </option>
              <option  value="5:00 pm"> 5:00 pm </option>
              <option  value="6:00 pm"> 6:00 pm </option>
              <option  value="7:00 pm"> 7:00 pm </option>
              <option  value="8:00 pm"> 8:00 pm </option>
              <option  value="9:00 pm"> 9:00 pm </option>
              <option  value="10:00 pm"> 10:00 pm </option>
              <option  value="11:00 pm"> 11:00 pm </option>
            </select>
          </li> 
          <li> 
            <label for="cancha"><p>Cancha:</p></label>
          
            <select name=cancha style="width:260px; height:34px; margin-left:1px" >';
            for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
              $resultado->data_seek($num_fila);
              $fila = $resultado->fetch_assoc(); 
              if ($fila['disp']!="nodisp"){
                echo '<option value='.$fila['numero'].'> Cancha'. $fila['numero'] .'</option>';
              }
              
            }
            echo '</select>
          </li> 
          <li> 
            <button class="submit" type="submit">Reservar</button> 
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