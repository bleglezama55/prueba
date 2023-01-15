<!DOCTYPE html>
<html>
    <head>
        <title>Registrarse</title>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/registroUsers.css">
        <link rel="stylesheet" type="text/css" href="librerias_boostrap/jquery-ui-1.12.1/jquery-ui.css">
    </head>
    <body>
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="imagenes/usuario-registrado.jpg" id="icon" alt="User Icon" />
      <h1>Registrate</h1>
    </div>

    <!-- Login Form --> <!-- Se agrega el metodo "post" y la función (agregarUsuarioNuevo) --> 
    <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
        <label>Nombre Personal</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required="">
        <label>Fecha de nacimiento</label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">    
        <label>Correo electrónico</label>
        <input type="email" name="correo" id="correo" class="form-control" required=""> 
        <label>Nombre de usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" required="">   
        <label>Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required=""> 
        <br>
        
        <input type="submit" value="REGISTRARSE">
                
    </form>   

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="index.php">Iniciar Sesiòn</a>
    </div>

  </div>
</div>  
    <script src="librerias_boostrap/jquery-3.5.1.min.js"></script>
    <script src="librerias_boostrap/jquery-ui-1.12.1/jquery-ui.js"></script>    
    <script src="librerias_boostrap/sweetalert.min.js"></script> 
        <!-- en javascript se crea la función para agregar el funcionamiento del formulario y la url de la conexión desde la
        ruta procesos/Usuario/registro/agregarUsuario.php--> 
   <script type="text/javascript">
       
       $(function(){
           var fechaA = new Date();
           var yyyy = fechaA.getFullYear();
           
           $("#fechaNacimiento").datepicker({
               
               changeMonth: true,
               changeYear: true,
               yearRange: '1900:' + yyyy,
               dateFormat: "dd-mm-yy"
               
           });
       });
       
       
       function agregarUsuarioNuevo(){
           $.ajax({
               method: "POST",
               data: $('#frmRegistro').serialize(),
               url: "procesos/Usuario/registro/agregarUsuario.php",
               success: function(respuesta){
                   respuesta = respuesta.trim();
                   
                   if(respuesta == 1){
                         $("#frmRegistro")[0].reset();
                         swal("Registro Completado", "Se registro el usuario con exito", "success");
                      }else if(respuesta == 2){
                         swal("Este usuario ya existe, Porfavor vuelvelo a intetntar!!!");
                      }else{
                         swal(":(", "Error de registro" ,"Error");
                   }
               }
               
           });
           
           return false;
           
       }
   </script>      
  </body>
</html>