<?php 
session_start();
if(isset($_SESSION['usuario'])){
    
include "header.php"; ?>

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
    <h1 class="display-4" style="color: #FFFFFF" id="TituloDoc">Gestor de archivos</h1>
      <span class="btn btn-primary" style="background: #045FB4;" data-toggle="modal" data-target="#modalAgregarArchivos">
          <span class="fas fa-plus-circle"></span> Agregar Archivos
      </span>
      <hr>
      <div id="tablaGestorArchivos"></div>
  </div>
</div>

<!-- Modal Agregar Archivos -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0174DF;">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: #58ACFA;">
          <form id="frmArchivos" enctype="multipart/form-data" method="post">
              <label>Categorias</label>
              <div id="categoriasLoad"></div>
              <label>Selecciona archivos</label>
              <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
          </form>
      </div>
      <div class="modal-footer" style="background-color: #58ACFA;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar Archivos</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal visualizar archivo -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>

<script src="../js/gestor.js"></script> <!-- Ruta de acceso gestor.js -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selectCategoria.php");
        
        //función de boton click        
        $('#btnGuardarArchivos').click(function(){  
            agregarArchivosGestor();
        });
    });

</script>

<!--<script src="../clases/Gestor.php"></script>
<script type="text/javascript">
    function validar(archivoruta){
        var archivoId = document.getElementById('visualizarArchivo');
        var archivoruta = archivoId.value;
        $idUsuario = $_SESSION['idUsuario'];
        var visor = new FileReader();
        $ruta = "../archivos/".$idUsuario."/".$nombre;
        visor.onload=function(e){
            document.getElementById('archivoObtenido').innerHTML='<embed scr="'+e.target.result'">';
        }
        visor.readAsDataURL($ruta);
        
    }
</script>-->
<?php 
  
    }else{
        header("location:../index.php");  
 }

?>