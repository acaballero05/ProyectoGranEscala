<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Alquila tu cancha | RESERVA</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/icono.ico">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
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
  <script type="text/javascript">
function muestra(campo,len){

for (i = 0; i < (len+1); i++) { 
    if(i==campo){
      document.getElementById(i).style.visibility="show";
    }
    else{
      document.getElementById(i).style.visibility="hidden";
    }
}

}
</script>
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
    <form class="contact_form" action="reservar_script.php" id="formulario_reserva2" method="post" >
      <ul> 
          <li> 
            <h1>Reserva</h1> 
          </li> 
          <li> 
            <label for="lugar"><p>Lugar:</p></label>
            

      <?php
              $mysqli = new mysqli("localhost", "root", "", "canchas");
              $resultado = $mysqli->query( "SELECT * FROM sitio");
              echo'<select name=lugar style="width:260px; height:34px; margin-left:1px" onchange="muestra(this.selectedIndex,'.$resultado->num_rows.');">';
              echo '<option value="0">Seleccione un lugar</option>';
              
              for ($cont=0; $resultado->num_rows > $cont; $cont++) {
                $resultado->data_seek($cont);
                $fila = $resultado->fetch_assoc(); 
                  echo '<option value='.$fila['id'].'> '. $fila['nombre'] .'</option>';
              }
              mysqli_close($mysqli);
              
              ?>
              </select>
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
          
            <select name=hora style="width:260px; height:34px; margin-left:1px">
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
            <div id="0">
              <select style="width:260px; height:34px; margin-left:1px;" >
                <option value="0">Seleccione una cancha</option>
              </select>

            </div>
            
              <?php
              $mysqli = new mysqli("localhost", "root", "", "canchas");
              $resultado = $mysqli->query( "SELECT * FROM cancha");
              $resultado2 = $mysqli->query( "SELECT * FROM sitio");
              for ($cont2=0; $resultado2->num_rows > $cont2; $cont2++) {
                
                $resultado2->data_seek($cont2);
                $fila2 = $resultado2->fetch_assoc(); 
                echo '<div id='. $fila2['id'].' style="display:none;">';
                echo '<select name=cancha style="width:260px; height:34px; margin-left:1px;"  >';
                for ($cont=0; $resultado->num_rows > $cont; $cont++) {
                  $resultado->data_seek($cont);
                  $fila = $resultado->fetch_assoc(); 
                  if ($fila['disp']!="nodisp" and $fila['id_sitio']==$fila2['id']){
                    echo '<option value='.$fila['numero'].'> Cancha'. $fila['numero'] .'</option>';
                  }
                }
                echo '</select>';
                echo '</div>';
              }
              mysqli_close($mysqli);
              ?>
            
          </li> 
          <li> 
            <button class="submit" type="submit">Reservar</button> 
          </li> 
        </ul> 
    
    </form>
    
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

