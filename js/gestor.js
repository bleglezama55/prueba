function agregarArchivosGestor(){  
    var formData = new FormData(document.getElementById('frmArchivos')); //Objeto javaScript para enviar archivos FormData
            //Plantilla de función de acceso
            $.ajax({
                url:"../procesos/archivos/guardarArchivos.php",
                type:"POST",
                datatype:"html",
                data: formData,
                cache: false,
                contentType:false,
                processData:false,
                success:function(respuesta){
                    console.log(respuesta);
                    
                    respuesta = respuesta.trim();
                    
                    if(respuesta == 1){
                        $('#frmArchivos')[0].reset();
                        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                        swal("Archivo Registrado","Se agrego con exito","success");
                       }else{
                           swal(":(","Fallo al agregar","error");
                       }
                }
            });
}

function eliminarArchivo(idArchivo){
    swal({
     title: "¿Seguro que quiere eliminar este archivo?",
     text: "Una vez eliminado, Ya no podra recuperar el archivo",
     icon: "warning",
     buttons: true,
     dangerMode: true,
  })
    .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            type:"POST",
            data:"idArchivo=" + idArchivo,
            url:"../procesos/archivos/eliminaArchivo.php",
            success:function(respuesta){
                
                respuesta = respuesta.trim();
                if(respuesta == 1){
                   $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                   swal("Archivo eliminado!", {
                   icon: "success",
                 });
              } else{
                  swal("Error al eliminar!", {
                   icon: "error",
                 });
              }
           }
            
        });
     } 
 });
}


function obtenerArchivoPorId(idArchivo){
    
    $.ajax({
       type:"POST",
       data:"idArchivo=" + idArchivo,
       url:"../procesos/archivos/obtenerArchivo",
       success:function(respuesta){
           $('#archivoObtenido').html(respuesta);
       }    
    });
}