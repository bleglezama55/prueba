<?php 

    require_once "Conexion.php";
    class Categorias extends Conectar{
        public function agregarCategoria($datos){
            $conexion = Conectar::conexion();
            
            $sql = "INSERT INTO t_categorias (id_usuario, nombre) VALUES (?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("is", $datos['idUsuario'],
                                     $datos['categoria']);
            
            $respuesta = $query->execute();
            $query->close();
            
            return $respuesta;
        }
               //Función eliminar categoria
        public function eliminarCategoria($idCategoria){
            $conexion = Conectar::conexion();
            
            $sql = "DELETE FROM t_categorias WHERE id_categorias = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idCategoria);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        
        public function obtenerCategoria($idCategoria){
            $conexion = Conectar::conexion();
            
            $sql = "SELECT id_categorias, nombre FROM t_categorias WHERE id_categorias = '$idCategoria'";
            $result = mysqli_query($conexion,$sql);
            
            $categoria = mysqli_fetch_array($result);
            
            $datos = array(
            
                "idCategoria" => $categoria['id_categorias'],
                "nombreCategoria" => $categoria['nombre']
            );
            return $datos;
        }
        
        public function actualizarCategoria($datos){
            $conexion = Conectar::conexion();
            
            $sql = "UPDATE t_categorias SET nombre = ? WHERE id_categorias = ?";
            
            $query = $conexion->prepare($sql);
            $query->bind_param("si", $datos['categoria'],
                                     $datos['idCategoria']);
            $respuesta = $query->execute();
            $query->close();
            
            return $respuesta;
        }
    }

?>