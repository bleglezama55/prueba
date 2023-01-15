<?php
   
  session_start();//Inicia la sesión
  require_once "../../clases/Categorias.php"; //ruta de clases
  $Categorias = new Categorias(); //objeto categoria


//muestra desde la clase categorias la funcion eliminar categorias
  echo $Categorias->eliminarCategoria($_POST['idCategoria']); 

?>