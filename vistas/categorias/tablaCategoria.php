<?php 
session_start(); //Iniciar sesion del usuario
require_once "../../clases/Conexion.php"; //Ruta de conexión
$idUsuario = $_SESSION['idUsuario']; //sesión del usuario
$conexion = new Conectar(); //Objeto de la clase Conexión
$conexion = $conexion->conexion(); //Función de la clase Conexión

?>
<div class="table-responsive">
     <table class="table table-hover" id="tablaCategoriaDataTable" style="color: #FFFFFF;">
        <thead>
            <tr style="text-align: center; background: #045FB4;">
              <td>Nombre</td>
              <td>Fecha</td>
              <td>Editar</td>
              <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                  $sql = "SELECT id_categorias ,nombre, fechainsert FROM t_categorias WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion,$sql);
            
            while($mostrar = mysqli_fetch_array($result)){
                $idCategoria = $mostrar['id_categorias']; 
            
            ?>
            
            <tr style="text-align: center; background: #58ACFA;">
                <td><FONT COLOR="black"><?php echo $mostrar['nombre'];?></FONT></td>
                <td><FONT COLOR="black"><?php echo $mostrar['fechainsert'];?></FONT></td>
                <td>
                    <span class="btn btn-warning btn-sm"
                          onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"  
                          data-toggle="modal" data-target="#modalActualizar">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-sm" 
                          onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
                        <span class="fas fa-trash-alt"></span>
                    </span>
                </td>
            </tr>
            <?php 
                
            }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
            $('#tablaCategoriaDataTable').DataTable({
                "language":{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros de página",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
               },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                   }
                }
                
            });
             
        });
</script>