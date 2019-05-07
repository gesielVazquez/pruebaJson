<?php

$json_file = file_get_contents('prueba.json');

$json_to_array = json_decode($json_file, True);

$total_goles_equipo = 0;
$total_goles_nivel = 0;

$niveles = array('A' => 5, 'B' => 10, 'C' => 15, 'Cuauh' => 20);
  foreach ($json_to_array as $jugador) {
    echo "</br></br> Jugador: ";
    print_r($jugador);
      if (!empty($jugador['sueldo'])){
        $total_goles_equipo += $jugador['goles'];
        $total_goles_nivel += $niveles[$jugador['nivel']];
      }
  }

  echo ("</br></br> Los Goles totales del equipo son : $total_goles_equipo");
  echo ("</br></br> El nivel goles necesario por equipo es de : $total_goles_nivel goles en total");

$porcen_bono_grupal = 0;

  if ($total_goles_equipo >= $total_goles_nivel){
    $porcen_bono_grupal = 100;
  }
  else {
    $porcen_bono_grupal = ($total_goles_equipo / $total_goles_nivel)*100;
  }

  echo ("</br></br> El porcentaje de bono por equipo es : $porcen_bono_grupal");

$file = "prueba.json";
if (!unlink($file))
  {
  echo ("</br></br> Error No se pudo borrar el archivo $file");
  }
else
  {
  echo ("</br></br> Archivo $file borrado satisfactoriamente.");
  }

 ?>
