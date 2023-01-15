<?php 

  //Conexión desde la base de datos
  class Conectar{
      
      public function conexion(){
          $servidor = "localhost";
          $usuario = "root";
          $password = "";
          $base = "gestorarch";
          
          $conexion = mysqli_connect($servidor, $usuario, $password, $base);
          $conexion->set_charset('utf8mb4');
          
          
          return $conexion;
      }
  }

?>