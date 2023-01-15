<?php 

   require_once "Conexion.php";

   class Gestor extends Conectar{
       public function agregaRegistroArchivo($datos){
           $conexion = Conectar::conexion();
           $sql = "INSERT INTO t_archivos (id_usuario,
                                           id_categorias,
                                           nombre,
                                           tipo,
                                           ruta)
                                 VALUES (?, ?, ?, ?, ?)";
           $query = $conexion->prepare($sql);
           $query->bind_param("iisss", $datos['idUsuario'],
                                       $datos['idCategoria'],
                                       $datos['nombreArchivo'],
                                       $datos['tipo'],
                                       $datos['ruta']);
           
           $respuesta = $query->execute();
           $query->close();
           return $respuesta;
       }
       
       public function obtenNombreArchivo($idArchivo){
           $conexion = Conectar::conexion();
           $sql = "SELECT nombre
                   FROM t_archivos
                   WHERE id_archivos = '$idArchivo'";
           $result = mysqli_query($conexion,$sql);
           
           return mysqli_fetch_array($result)['nombre'];
       }
       
       public function eliminarRegistroArchivo($idArchivo){
           $conexion = Conectar::conexion();
           $sql = "DELETE FROM t_archivos WHERE id_archivos = ?";
           $query = $conexion->prepare($sql);
           $query->bind_param('i', $idArchivo);
           $respuesta = $query->execute();
           $query->close();
           return $respuesta;
       }
       
       public function obtenerRutaArchivo($idArchivo){
           $conexion = Conectar::conexion();
           $sql = "SELECT nombre, tipo FROM t_archivos WHERE id_archivos = '$idArchivo'";
           $result = mysqli_query($conexion,$sql);
           $datos = mysqli_fetch_array($result);
           $nombreArchivo = $datos['nombre'];
           $extension = $datos['tipo'];
           return self::tipoArchivo($nombreArchivo, $extension);
       }
       
       public function tipoArchivo($nombre, $extension){
           $idUsuario = $_SESSION['idUsuario']; 
           $ruta = "../archivos/".$idUsuario."/".$nombre;
           switch($extension ){
               case 'png':
                     return '<img src="'.$ruta.'" width="100%">';
                   break;
               case 'jpg':
                     return '<img src="'.$ruta.'" width="100%">';
                   break;
               case 'pdf':
                      return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                   break;
               case 'mp3':
                     return '<audio controls src="'.$ruta.'"></audio>';
                   break;       
               case 'mp4':
                      return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
                   break;  
               case 'docx':
                     
                      
                   break;   
              case 'doc':
                      // return '<iframe src="https://docs.google.com/document/d/e/2PACX-1vSB5V1uDxGnkp4MPNMMCx8ki-WsCrdZ7fKblvKaZ6Gt3rjfsDj1s1_XEV8FLfcxNbLyZ-ZV73VqXpa9/pub?embedded=true" width="100%" height="600px"></iframe>'; 
                      
                   break;     
              case 'txt':
                      return '<embed src="'.$ruta.'" width="750" height="300">';
                      
                   break;         
               case 'jpeg':
                      return '<img src="'.$ruta.'" width="100%">';
                   break;
               case 'xlsx':
                    //  return '<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTSxzSDRHNlbX7QIUbOvkFlLEF-nfB-8qcNw5vakD18T8wWRHEAL62g3LNSGVDxWZBd-L3YGXlVdYTR/pubhtml?widget=true&amp;headers=false" width="750" height="300"></iframe>';
                   break;        
               case 'pptx':
                      //return '<iframe src="'.$ruta.'" width="30%" height="220px">';
                   break;         
               default:
                  break;
           }
           
       }
   }

?>

