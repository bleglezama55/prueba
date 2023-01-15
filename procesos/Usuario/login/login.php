<?php

  //Inicio de sesión
  session_start();
  require_once "../../../clases/Usuario.php";

  $usuario = $_POST['login'];
  $password = sha1($_POST['password']);  //sha1 encriptando contraseña


  //Objeto clase (Usuario)
  $usuarioObj = new Usuario();


  //Impresión de resultado
  echo $usuarioObj->login($usuario, $password);

?>