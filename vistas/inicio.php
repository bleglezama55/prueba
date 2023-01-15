<?php 
      session_start();

      if(isset($_SESSION['usuario'])){
      include "header.php"; 
?>
    
<style>
#TituloDoc {
  --background-color: #000000;
  background: linear-gradient(70deg, #FFFFFF,#58ACFA,#045FB4,#58ACFA,#FFFFFF);      
  color: #084B8A;
  margin-top: -20px;    
  padding: 10px;
  text-align: center;
  font-family: "Homer Simpson UI";
}
</style>
    

<div class="jumbotron jumbotron-fluid" style="background: #D8D8D8;">
  <div class="container">
        <h1 class="display-4" style="color: #FFFFFF" id="TituloDoc">Gestor de archivos</h1>
         <hr> 
      <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div style="color: #000000">
                        <p style="font-family: Lucida Bright">El gestor de archivos proporciona una manera sencilla e integrada de gestionar archivos y aplicaciones. Puede utilizar el gestor de archivos para realizar las siguientes acciones:</p>

                        <ul>
                        <li style="font-family: Lucida Bright"> Crear carpetas y documentos</li>

                        <li style="font-family: Lucida Bright">Mostrar archivos y carpetas</li>

                        <li style="font-family: Lucida Bright">Buscar y gestionar archivos</li>
                        
                       <li style="font-family: Lucida Bright">Personalizar la apariencia de archivos y carpetas</li>
                        </ul>
                        
                        <p style="font-family: Lucida Bright">Todos los usuarios tienen una carpeta personal, que contiene todos los archivos relacionados con el usuario. El escritorio contiene iconos especiales que permiten un acceso sencillo a la papelera y la carpeta personal del usuario, y también a medios extraíbles, como disquetes, CD y unidades flash USB.</p>
                        <p style="font-family: Lucida Bright">En este sitio sirven para ilustrar la estructura de los archivos y permiten una gestión sencilla e intuitiva de los archivos almacenados, estos les permitirá guardar, editar, copiar o borrar archivos, así como ordenar un archivero práctico de realizar sensillas tareas.</p>
                    </div>
                </div>
            </div>
            
        </div>
  </div>
</div>
  
        

<?php 
          
      include "footer.php";
          
      }else{
          header("location:../index.php");
      }
?>