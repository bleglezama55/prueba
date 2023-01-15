<?php 

  //ruta de acceso a la conexión
  require_once "../../../clases/Usuario.php";
  
  //impresión de resultado
  $password = sha1($_POST['password']); //Se incripta la contraseña 
  //Divide por guiones la fecha del formato
  $fechaNacimiento = explode("-",$_POST['fechaNacimiento']);
  $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
  $datos = array(                         //Recibe los datos en un arreglo
            "nombre" => $_POST['nombre'],
            "fechaNacimiento" => $fechaNacimiento,
            "email" => $_POST['correo'],
            "usuario" => $_POST['usuario'],
            "password" => $password
        );

$usuario = new Usuario();  //M¿Objeto desde la clase Uusario.php
echo $usuario->agregarUsuario($datos); //Imprime el resultados de los datos

?>