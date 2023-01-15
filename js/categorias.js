function agregarCategoria(){
    var categoria = $('#nombreCategoria').val();
            
            if(categoria == ""){
                swal("Debes agregar una Categoria");
                return false;
               }else{
                   $.ajax({
                       type:"POST",
                       data:"categoria=" +categoria,
                       url:"../procesos/categorias/agregarCategoria.php",
                       success:function(respuesta){
                           respuesta = respuesta.trim();
                           
                           if(respuesta == 1){
                               $('#tablaCategorias').load("categorias/tablaCategoria.php");
                               $('#nombreCategoria').val(" ");
                               swal("Se guardo la Categoria", "Se registro con exito!","success");
                           }else{
                               swal(":("," Error de registro","error");
                           }
                       
               }
      });
   }
}
           
function eliminarCategoria(idCategoria){
    //imprime el id categoria
    idCategoria = parseInt(idCategoria);
    if(idCategoria < 1){
        swal("No tienes id de categoria!");
        return false;
    }else{  //Muestra los las advertencia de los letreros cuando va eliminar 
        //*****************************************
        swal({
         title: "¿Seguro de que desea eliminar la categoria?",
         text: "Al eliminar, Ya no se podra recuperar!",
         icon: "warning",
         buttons: true,
         dangerMode: true,
      })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                 type:"POST",
                 data:"idCategoria= " + idCategoria,
                 url:"../procesos/categorias/eliminarCategoria.php",
                 success:function(respuesta){
                     respuesta = respuesta.trim();
                     if(respuesta == 1){
                          //Carga y refresca las sentencias de la tabla categorias
                          $('#tablaCategorias').load("categorias/tablaCategoria.php");
                          swal("Se elimino con exito!", {
                          icon: "success",
                    });
                 }else{
                     swal(":(","Fallo al eliminar!","error");
                 }
            }
        });
      } 
    }); //***********************************
  }
}


function obtenerDatosCategoria(idCategoria){
    $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            
            $('#idCategoria').val(respuesta['idCategoria']);
            $('#categoriaA').val(respuesta['nombreCategoria']);
            
        }
    });
    
}


function actualizaCategoria(){
    if($('#categoriaA').val() == ""){
        swal("No hay categoria!!");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizarCategoria').serialize(),
            url:"../procesos/categorias/actualizaCategoria.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                
                if(respuesta == 1){
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    $('#btncerrarUpdateActualizarCate').click();
                    swal("Categoria se actualizó","Actualización con exito","success");
                }else{
                     swal(":(","Error al Actualizar!","error");
                }
                
            }
        });
    }
}





