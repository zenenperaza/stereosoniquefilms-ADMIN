/*=============================================
ELIMINAR  reels
=============================================*/
$(".btnEliminarReel").click(function() {
  
  var idReel = $(this).attr("idReel");
  
  swal({
    title: '¿Está seguro de borrar el Reel?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Reel!'
  }).then(function(result){

    if(result.value){

      window.location = "../reel?idReel="+idReel;

    }

  })

})

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
  
        window.location = "../videos?idVideo="+idVideo+"&rutaVideo="+rutaVideo;
  
      }
  
    })
  
  })


  /*=============================================
ELIMINAR WORK
=============================================*/
$(".btnEliminarWork").click(function() {
  
  var id = $(this).attr("id");
  var rutaVideo = $(this).attr("rutaVideo");
  var rutaImagen = $(this).attr("rutaImagen");
  
  
  swal({
    title: '¿Está seguro de borrar el Work?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Work!'
  }).then(function(result){

    if(result.value){

      window.location = "../work?idWork="+id+"&rutaVideo="+rutaVideo+"&rutaImagen="+rutaImagen;

    }

  })

})

/*=============================================
SUBIENDO LA FOTO DEL BANNER
=============================================*/
$("#imagen").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 20MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})



  