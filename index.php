<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesión</title>
        <link rel="stylesheet" type="text/css" href="css/Login.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="imagenes/uguriarch.jpg" id="icon" alt="User Icon" />
      <h1>Iniciar Sesión</h1>
    </div>

    <!-- Login Form -->
    <form method="post" id="frmLogin" onsubmit="return logear()">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
      <input type="submit" class="fadeIn fourth" value="Iniciar sitio">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="registrar.php">Crear una cuenta</a>
    </div>

  </div>
</div> 
    <script src="librerias_boostrap/jquery-3.5.1.min.js"></script><!-- libreria del manejo del ajax-->     
    <script src="librerias_boostrap/sweetalert.min.js"></script><!--libreria de alerta de validación del registro ajax --> 
        
        
    <script type="text/javascript">
        function logear(){
            $.ajax({
                type: "POST",
                data:$("#frmLogin").serialize(),
                url:"procesos/Usuario/login/login.php",
                success:function(respuesta){
                //alert(respuesta);
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    window.location = "vistas/inicio.php";
                 }else{
                    swal(":(","Fallo de inicio","error");  
                 }
              }
                
            });
            
            return false;
        }
    
    </script>    
        
    </body>
</html>