<?php
    //require archivo desde la conexión
    require_once "Conexion.php";

    //clase Usuario extiende la clase Conectar y crea la función de clase (agregarUsuario) para que mande la conexión desde clase conexion
    class Usuario extends Conectar{
        public function agregarUsuario($datos){
            $conexion = Conectar::conexion();
            
            if(self::buscarUsuarioRepetido($datos['usuario'])){
                return 2;
            }else{
                $sql = "INSERT INTO g_usuarios (nombre,fechaNacimiento,email,usuario,password) VALUES (?,?,?,?,?)";
            
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss', $datos['nombre'],
                                        $datos['fechaNacimiento'],
                                        $datos['email'],
                                        $datos['usuario'],
                                        $datos['password']);
            $exito = $query->execute();
            $query->close();
            return $exito;
        }
      }
        
      //Funcion usuario repetido    
      public function buscarUsuarioRepetido($usuario){
       $conexion = Conectar::conexion();
       
       $sql = "SELECT usuario FROM g_usuarios WHERE usuario = '$usuario'";
       $result = mysqli_query($conexion, $sql);
       $datos = mysqli_fetch_array($result);
       
       if($datos['usuario'] != "" || $datos['usuario'] == $usuario ){
           return 1;
       }else{
           return 0;
       }
                
    }
        
        
    public function login($usuario, $password){
        $conexion = Conectar::conexion();
        
        //Sentencia de usuarios existentes y si existe envia una respuesta 
        $sql = "SELECT count(*) as existeUsuario 
                FROM g_usuarios
                WHERE usuario = '$usuario'
                AND password = '$password'";
        $result = mysqli_query($conexion,$sql);
        
        $respuesta = mysqli_fetch_array($result)['existeUsuario'];
        
        //Si se inicia sesión un usuario existente 
        if($respuesta > 0){
            //Entonces inicia sesión e usuario
            $_SESSION['usuario'] = $usuario;
            
            //Sentencia de busqueda id de usuarios
            $sql = "SELECT id_usuario 
                    FROM g_usuarios
                    WHERE usuario = '$usuario'
                    AND password = '$password'";
            $result = mysqli_query($conexion,$sql);
            $idUsuario = mysqli_fetch_row($result)[0];
            
            //Entonces inicia sesión con la id
            $_SESSION['idUsuario'] = $idUsuario;
            
            return 1;
        }else{
            return 0;
        }
             
    } 

   
} 
 
?>