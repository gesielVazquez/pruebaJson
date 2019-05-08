<?php
//Se usa la fecha actual para nombrar el archivo final, evita duplicados.
date_default_timezone_set("America/Mexico_City");
$date = date("h-i-s_d-m-Y");

$json_file = file_get_contents('prueba.json');

$json_to_array = json_decode($json_file, True);

$total_goles_equipo = 0;
$total_goles_nivel = 0;

  if (!array_key_exists('nivel', $json_to_array[0])){

    foreach ($json_to_array as $jugador) {

      if (!empty($jugador['sueldo'])){
        $total_goles_equipo += $jugador['goles'];
        $total_goles_nivel += $jugador['goles_minimos'];
      }

    }
}
  else {

    $niveles = array('A' => 5, 'B' => 10, 'C' => 15, 'Cuauh' => 20);

      foreach ($json_to_array as $jugador) {

        if (!empty($jugador['sueldo'])){
          $total_goles_equipo += $jugador['goles'];
          $total_goles_nivel += $niveles[$jugador['nivel']];
        }
      }
  }

$porcen_bono_grupal = 0;

  if ($total_goles_equipo >= $total_goles_nivel){
    $porcen_bono_grupal = 100;
  }
    else {
      $porcen_bono_grupal = ($total_goles_equipo / $total_goles_nivel)*100;
    }

$json_final = array();

  if (!array_key_exists('nivel', $json_to_array[0])){

    foreach ($json_to_array as $jugador) {

      if (!empty($jugador['sueldo'])){

        if ($jugador['goles'] >= $jugador['goles_minimos']){
          $porcen_bono_Ind = 100;
        }
          else {
            $porcen_bono_Ind = ($jugador['goles']/$jugador['goles_minimos'])*100;
          }

          $porcen_total = ($porcen_bono_grupal + $porcen_bono_Ind)/2;
          $bono_real = ($jugador['bono'] * $porcen_total)/100;
          $sueldo_completo = $jugador['sueldo'] + $bono_real;
          $jugador['sueldo_completo'] = $sueldo_completo;
          array_push($json_final,$jugador);
        }
    }
  }

    else{


      foreach ($json_to_array as $jugador) {

        if (!empty($jugador['sueldo'])){

          if ($jugador['goles'] >= $niveles[$jugador['nivel']]){
            $porcen_bono_Ind = 100;
          }
          else {
            $porcen_bono_Ind = ($jugador['goles']/$niveles[$jugador['nivel']])*100;
          }

          $porcen_total = ($porcen_bono_grupal + $porcen_bono_Ind)/2;
          $bono_real = ($jugador['bono'] * $porcen_total)/100;
          $sueldo_completo = $jugador['sueldo'] + $bono_real;
          $jugador['sueldo_completo'] = $sueldo_completo;
          array_push($json_final,$jugador);
        }
      }
    }

$fp = fopen('res_'.$date.'.json', 'w');
fwrite($fp, json_encode($json_final));
fclose($fp);

$file = "prueba.json";
  if (!unlink($file)){

  echo ("</br></br> Error No se pudo borrar el archivo $file");
  }

 ?>
