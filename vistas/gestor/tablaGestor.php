<?php

    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['idUsuario']; 
    $sql = "SELECT 
                   archivos.id_archivos AS idArchivo,
                   usuarios.nombre AS nombreUsuario,
                   categorias.nombre AS Categoria,
                   archivos.nombre AS nombreArchivo,
                   archivos.tipo AS tipoArchivo,
                   archivos.ruta AS rutaArchivo,
                   archivos.fecha AS Fecha
            FROM
                   t_archivos AS archivos 
         INNER JOIN
                g_usuarios AS usuarios ON archivos.id_usuario = usuarios.id_usuario
         INNER JOIN
                t_categorias AS categorias ON archivos.id_categorias = categorias.id_categorias
            AND 
                archivos.id_usuario = '$idUsuario'";
     $result = mysqli_query($conexion,$sql); 

?>


<div class="row">
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-hover" id="tablaGestorData" style="color: #FFFFFF;">
          <thead>
              <tr style="text-align: center; background: #045FB4;">
                  <th>Categoria</th>
                  <th>Nombre</th>
                  <th>Tipo de archivo</th>
                  <th>Descargar</th>
                  <th>Visualizar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              
              /*Arreglo de extensiones validas*/
              
              $extensionesValidas = array('png','jpg','pdf','mp3','mp4','docx','jpeg','pptx','doc','txt','xlsx');
              
               while($mostrar = mysqli_fetch_array($result)){
                   //ruta de descarga donde se encuentran los archivos en linea
                   $rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
                   //muestra el nombre del archivo al descargar
                   $nombreArchivo = $mostrar['nombreArchivo'];
                   $idArchivo = $mostrar['idArchivo'];
              
              ?>
              <tr style="text-align: center; background: #58ACFA;">
                  <th><FONT COLOR="white"><?php echo $mostrar['Categoria'];?></FONT></th>
                  <th><FONT COLOR="white"><?php echo $mostrar['nombreArchivo'];?></FONT></th>
                  <th><FONT COLOR="white"><?php echo $mostrar['tipoArchivo'];?></FONT></th>
                  <th>
                      
                      <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" 
                         class="btn btn-success btn-sm">
                         <span class="fas fa-download"></span>
                          
                      </a>
                  
                  </th>
                  <th>
                                  
                      <?php 
                           //Evalua el arreglo de extensiones que pueden mostrar el tipo de archivo
                           for ($i=0; $i < count($extensionesValidas); $i++){
                               if($extensionesValidas[$i] == $mostrar['tipoArchivo']){
                                                       
                      ?>
                           <!-- Boton de icono para que pueda visualizar dependiendo el tipo de archivo -->
                           <span class="btn btn-secondary btn-sm" 
                            data-toggle="modal" 
                            data-target="#visualizarArchivo" 
                            onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')"> 
                           <span class="fas fa-eye"></span>
                           </span>  
                      
                      <?php 
                   
                              }
                           }
                      ?>

                  
                  </th>
                  <th>
                      <span class="btn btn-danger btn-sm" 
                            onclick="eliminarArchivo('<?php echo $idArchivo?>')">
                          <span class="fas fa-trash-alt"></span>
                      </span>
                        
                  </th>
              </tr>
              <?php 
                 }
              ?>
          </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorData').DataTable({
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
         $("<style type='text/css'> .redbold{ color:#f00; font-weight:bold;} </style>").appendTo("lengthMenu");
        
    });
</script>