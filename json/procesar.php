<?php

$json_file = file_get_contents('prueba.json');
print_r($json_file);

$file = "prueba.json";
if (!unlink($file))
  {
  echo ("Error No se pudo borrar el archivo $file");
  }
else
  {
  echo ("Archivo $file borrado satisfactoriamente.");
  }

 ?>
