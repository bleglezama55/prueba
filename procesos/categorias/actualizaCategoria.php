<?php 

    require_once "../../clases/Categorias.php";
    $Categorias = new Categorias();

    $datos = array(
        
              "idCategoria" => $_POST['idCategoria'],
              "categoria" => $_POST['categoriaA']
        
    );

    echo $Categorias->actualizarCategoria($datos);

?>