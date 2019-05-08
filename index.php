<?php
      $formato = array ('.json');
      $directorio = __DIR__ .'/json/';

        if (!empty($_FILES)){

          if (isset($_FILES['archivo'])){

            $nombreArchivo = $directorio."prueba.json";

            $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
            $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));

              if ($ext == '.json'){

                if(move_uploaded_file($nombreTmpArchivo, $nombreArchivo)){

                  header ("Location: json/procesar.php");
                }
                  else{
                    echo"Ocurrio un Error!!";
                  }
            }
              else{
                echo "Solo se admiten archivos .json Favor de verificar el archivo.";
            }

          }
          else{
            echo"ERROR. No se encontro el archivo.";
          }

        }
        else{
          echo "El archvio no tiene datos";
        }

 ?>

 <!DOCTYPE html>
 <html lang="es">
     <head>
         <meta charset="utf-8" />
         <title>Lectura y Modificación de Archivo Json</title>
     </head>
     <body>
       <div class= "caja">
         <form method="post" action="" enctype="multipart/form-data">
             <h1>Selecione el archivo Json</h1>
             <input type="file" accept=".json" name="archivo">
             <input type="submit" value="Cargar Archivo Json">
         </form>
       </div>
     </body>
 </html>
