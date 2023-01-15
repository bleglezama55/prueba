<?php

   //print_r($_FILES);
     session_start();
     require_once "../../clases/Gestor.php";
     $Gestor = new Gestor();
     $idCategoria = $_POST['categoriasArchivos'];
     $idUsuario = $_SESSION['idUsuario'];

     if($_FILES['archivos']['size'] > 0){  //Si los tamaños de los archivos son registrados
         
         $carpetaUsuario = '../../archivos/'.$idUsuario; //ruta del nombre de la carpeta y el numero de usuario
         
         if(!file_exists($carpetaUsuario)){  //Si la carpta no existe
             mkdir($carpetaUsuario, 0777, true); //lo direcciona la acarpeta mkdir
         }
         
         $totalArchivos = count($_FILES['archivos']['name']);  //Entonces que cuente el total de archivos
         for($i=0; $i < $totalArchivos; $i++){
             
             $nombreArchivo = $_FILES['archivos']['name'][0];   //Nombre del archivo
             $explode = explode('.',$nombreArchivo);     //Que lea Extensión del archivo junto con  el nombre del archivo 
             $tipoArchivo = array_pop($explode);          //el tipo de archivo inserte la exensión
             
             $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];  //ruta donde se guardan los archivos
             $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;  //ruta final es donde se guardan esos archivos
             
             //Arreglo de datos de archivos
             $datosRegistroArchivos = array(  
                                             "idUsuario" => $idUsuario,
                                             "idCategoria" =>  $idCategoria,
                                             "nombreArchivo" => $nombreArchivo,
                                             "tipo" => $tipoArchivo,
                                             "ruta" => $rutaFinal);
             
             //Si carga los archivos registrados 
             if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){  
                 //Entonces que agregue desde la BD los archivos
                 $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivos); 
             }   
         }
         
         echo $respuesta; //imprime el resultado
         
     }else{
         echo 0;
     }
?>