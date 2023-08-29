    /*=============================================
ELIMINAR VIDEO
=============================================*/
$(".btnEliminarVideo").click(function() {
  
    var idVideo = $(this).attr("idVideo");
    var rutaVideo = $(this).attr("rutaVideo");
    
    swal({
      title: '¿Está seguro de borrar el video?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar video!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "../inicio?idVideo="+idVideo+"&rutaVideo="+rutaVideo;
  
      }
  
    })
  
  })