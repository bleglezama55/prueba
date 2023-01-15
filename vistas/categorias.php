<?php 
      session_start();

      if(isset($_SESSION['usuario'])){
      include "header.php"; 
?>

<style>
#TituloDoc {
  --background-color: #000000;
  background: linear-gradient(70deg, #81DAF5,#58ACFA,#045FB4,#00245A,#045FB4,#58ACFA,#81DAF5);      
  color: #084B8A;
  margin-top: -20px;    
  padding: 10px;
  text-align: center;
  font-family: "Homer Simpson UI";
}
</style>
  
<div class="jumbotron jumbotron-fluid" style="background: #D8D8D8;">
  <div class="container">
        <h1 class="display-4" style="color: #FFFFFF" id="TituloDoc">Categorías</h1>
        
         <div class="row">
             <div class="col-sm-4">
                 <span class="btn btn-primary" style="background: #045FB4;" data-toggle="modal" data-target="#modalAgregaCategoria">
                     <span class="fas fa-plus-circle"></span> Agregar nueva categoría
                 </span>
             </div>
         </div>
         <hr>
         <div class="row">
             <div class="col-sm-12">
                 <div id="tablaCategorias"></div> 
             </div> 
         </div>            
  </div>
</div>


<!-- Modal y Acción del botón agregar -->  
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0174DF;">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: #58ACFA;">
        <form id="frmCategorias">
            <label>Nombre de la categoría</label> <!--Entrada de texto para escribirnla categoria del texto -->
            <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer" style="background-color:#58ACFA;"> <!--Opciones de menú en el modal del letrero -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalActualizar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #DBA901;">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: #FACC2E;">
           <form id="frmActualizarCategoria">
                <input type="text" id="idCategoria" name="idCategoria" hidden="">
                <label>Categoria</label>
                <input type="text" id="categoriaA" name="categoriaA" class="form-control">
          </form>
      </div>
      <div class="modal-footer" style="background-color: #FACC2E;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btncerrarUpdateActualizarCate">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizarCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php 
          
      include "footer.php";
          
?>
    <!--Dependencias de categorias, todas las funciones js de categorias-->
<script src="../js/categorias.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategorias').load("categorias/tablaCategoria.php"); //Carga los resultados desde la clase "tablaCategoria"
                                                                     //con la acción de la tabla "tablaCategorias"
        
        $('#btnGuardarCategoria').click(function(){ //En el boton guardar se hace la acción para guardar categoria desde la
            agregarCategoria();                     //clase "agregarCategoria" 
        });
        
        $('#btnActualizarCategoria').click(function(){
            actualizaCategoria(); 
        });
    });

</script>
      
<?php          
      }else{
          header("location:../index.php");
      }
?>