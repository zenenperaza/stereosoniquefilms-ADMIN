$(document).ready(function(){
    
    if(location.href.indexOf("inicio?page")!=-1){
        //posiciona el scroll de la pagina en medio
        $('body,html').stop(true).animate({
            'scrollTop': 700
        }, 1000, 'easeInOutExpo');
    }
        
    $("#clave").keypress(function(e) {
        //no recuerdo la fuente pero lo recomiendan para
        //mayor compatibilidad entre navegadores.
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            iniciar_sesion();
        }
    });
    $("#archivo").change(function (e) {

        subir_imagen_noticias();
//        $(this).val("");
    });     
    
    $("#votar").click(function (e) {
        
        
         var form_data = new FormData();

        form_data.append("id_articulo", $("#id_articulo").val());
        form_data.append("tipo","voto");

        $.ajax({

            url:"votar",
            type:"POST",
            contentType:false,        
            data:form_data,
            processData:false,
            cache:false,            
            dataType: 'json',
            success : function(datos) {		
            console.log(datos.response);

            if(datos.response == "votos"){
                $("#votos").html("A "+datos.votos+" personas le gustó este artículo");
               alert("Gracias por su voto");
            } 
            if(datos.response == "erroryavotado"){
                
               alert("Usted ya voto este articulo");
            } 
            if(datos.response == "error"){
              
               alert("¿Que quiere votar?");
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
           alert("Status: " + textStatus+ ", Error: " + errorThrown); 
         
        }

        });
//        $(this).val("");
    });  
    
    
    
        //IMAGEN DE PORTADA
    var _URL = window.URL || window.webkitURL;
    $("#archivo_portada").change(function (e) {
        //alert("h");
        banner = this;//elemento
        if(banner.value.split('.').pop()=="jpg" || banner.value.split('.').pop()=="jpeg" || banner.value.split('.').pop()=="png"){
            
            
        
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {	

//                if(this.width=="525" && this.height=="350"){
            readImage(banner,"imagen");
//                }else{
//                    alert("la imagen debe ser de 525 x 350 y es de "+this.width + " x " + this.height);//este this es de la imagen
//                    $("#archivo_portada").val("");
//                }  

            };
             img.src = _URL.createObjectURL(file);					
          }
        }else{
            alert("Debe seleccionar una imagen jpg");
            this.value="";
        }
	});
    
$(".contenedor_multimedia a").click(function(){/* oculta muestra contenido multimedia*/
										  
						  
	var divComment = $(this).parent().children('.ocultafoto');					  

	if(divComment.hasClass('ocultafoto')){
		 if($(this).html()=="Ocultar contenido multimedia"){
			 
				 $( divComment ).animate({
					opacity: 0.05,
					left: "+=50",
					height: "toggle"
				  }, 1000, function() {
		
				})
			   $(this).html("Abrir contenido multimedia");  
		 }else{
			   $( divComment ).animate({
					opacity: 100,
					left: "+=50",
					height: "toggle"
				  }, 1000, function() {
		
				})
			  $(this).html("Ocultar contenido multimedia");
			  
		 } 

 	}
 
  });
    
});

 function readImage (input,img) {
	   
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {		  
          $('#'+img).attr('src', e.target.result); // Renderizamos la imagen
		  	   
      }
      reader.readAsDataURL(input.files[0]);
	  
    }
} 
function reaccionar(emocion,id_articulo){

         var form_data = new FormData();

        form_data.append("id_articulo",id_articulo);
        form_data.append("tipo",emocion);

        $.ajax({

            url:"../votar",
            type:"POST",
            contentType:false,        
            data:form_data,
            processData:false,
            cache:false,            
            dataType: 'json',
            success : function(datos) {		
            console.log(datos.response);

            if(datos.response == "votos"){
                $(".votos").html("A "+datos.votos+" personas le gustó este artículo");
                $(".votos_"+id_articulo).html(datos.votos);
//               alert("Gracias por su voto");
            } 
            if(datos.response == "erroryavotado"){
                
               alert("Usted ya voto este articulo");
            } 
            if(datos.response == "error"){
              
               alert("¿Que quiere votar?");
            }
                
                $(".descripcion_reaccion_"+id_articulo).html(datos.tipo);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
           alert("Status: " + textStatus+ ", Error: " + errorThrown); 
         
        }

        });
}
//function iniciar_sesion(){
//    if($('#recordar').is(":checked")){
//        recordarse="true";
//        
//    }else{
//        recordarse="false";
//    }
//    
//	correose=$("#usuario").val();
//	contrasenase=$("#clave").val();	
//	//recordarse=$("#recordar").checked;	
//	
//	$.ajax({
//		url: 'sesionconfirma',
//		type: 'POST',
//		data:{ usuario: correose,clave: contrasenase, recordar:recordarse},
//		success: function(data) {
//		//alert("d="+data);
//			if(data=="1"){		
//              
//				location.href="administracion/blog/crear_noticia.php";
//				
//			}else{
//				$("#mensaje_error").html(data);
//				
//			}		
//		}
//	});
//    
//}

function comentariopublico(id){
//    agotado = $("#agotado_"+id_producto).val();
      if($("#comentariopublico_"+id).is(":checked")){
          publico = "0";
      }else{
          publico = "1";
      }
    
    $.ajax({
    data:{ id: id,publico:publico},
    type: "POST",  
    url: "comentario_publico.php",
    })
     .done(function( data, textStatus, jqXHR ) {
        $("#respuesta").html(data);
        $(".modal-title").html("Modificación de existencia");
//        alert("li");

     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
//             console.log( "La solicitud a fallado: " +jqXHR+","+  textStatus+","+errorThrown);
         }
    });
    
}
function contratar_servicios(){
  //  alert("contenido = "+$("#editor").html());

    $("#mensaje").css("display","block");

    if($("#widget-subscribe-form-firstname").val()===""){
        alert("Agregue su nombre");
        $("#widget-subscribe-form-firstname").focus();
        $("#mensaje").css("color","red");
        $("#mensaje").html("Capture su nombre");
        return false;

    }    
  
    if($("#widget-subscribe-form-subject").val()===""){
        alert("Agregue su mensaje");
        $("#widget-subscribe-form-subject").focus();
        $("#mensaje").css("color","red");
        $("#mensaje").html("Capture su mensaje");
        return false;       
    }    
    if($("#widget-subscribe-form-email").val()===""){
        alert("Agregue su correo");
        $("#widget-subscribe-form-email").focus();
        $("#mensaje").css("color","red");
        $("#mensaje").html("Capture su correo");
        return false;

    }  


    var post_url = $(".contratar_servicio").attr("action"); //get form action url
    var request_method = $(".contratar_servicio").attr("method"); //get form GET/POST method

    var form_data = new FormData();

    form_data.append("widget-subscribe-form-id_articulo", $("#widget-subscribe-form-id_articulo").val());
    form_data.append("widget-subscribe-form-firstname", $("#widget-subscribe-form-firstname").val());
    form_data.append("widget-subscribe-form-email", $("#widget-subscribe-form-email").val());
    form_data.append("widget-subscribe-form-subject", $("#widget-subscribe-form-subject").val());
    form_data.append("widget-subscribe-form-celular", $("#widget-subscribe-form-celular").val());


    $.ajax({

        url:post_url,
        type:request_method,
        contentType:false,        
        data:form_data,
        processData:false,
        cache:false,            
        dataType: 'json',
        success : function(datos) {		
        console.log(datos.response);

        if(datos.response == "success"){
            $("#mensaje").css("color","green");
            $("#mensaje").html("Gracias por su mensaje, nos comunicaremos con usted");
        }else{
            $("#mensaje").css("color","red");
            $("#mensaje").html(datos.response);

        }

    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        $("#cargando").html("Status: " + textStatus+ ", Error: " + errorThrown); 
         $("#cargando").css("display","none");
        $("#cargando").attr("class","error");
    }

    });  
}
function enviar_articulo(){
    $("#btnenviararticulo").attr("disabled","disabled");
    console.log(editorglobal);
 
    if($("#titulo").val()===""){
        alert("Agregue un titulo");
        $("#titulo").focus();
        $("#btnenviararticulo").removeAttr("disabled");
        return false;
    }     
    if($("#metas").val()===""){
        alert("Agregue los metas");
        $("#metas").focus();
        $("#btnenviararticulo").removeAttr("disabled");
        return false;
    }     
    if($("#metadescripcion").val()===""){
        alert("Agregue una metadescripcion");
        $("#metadescripcion").focus();
        $("#btnenviararticulo").removeAttr("disabled");
        return false;
    }   
    if(editor.getData()===""){
        alert("Agreguele contenido compa");
        $("#btnenviararticulo").removeAttr("disabled");
        editor.focus();
        return false;
    }    
 
    
        var post_url = $("#subir_noticias_principal").attr("action"); //get form action url
        var request_method = $("#subir_noticias_principal").attr("method"); //get form GET/POST method
 
        var form_data = new FormData();    
  
        if($("#id").val()!=undefined){
            form_data.append("id", $("#id").val());
        }
    
        form_data.append("titulo", $("#titulo").val());    
   
        $( ".ck-widget__type-around" ).remove();//quita la etiqueta figure de las imagenes
 
        form_data.append("contenido", editor.getData());
        form_data.append("metas", $("#metas").val());
        form_data.append("metadescripcion", $("#metadescripcion").val());
        form_data.append("urlbotonsiguiente", $("#urlbotonsiguiente").val());
        form_data.append("categoria", $("#categoria").val());
        form_data.append("idusuarioescritor", $("#idusuarioescritor").val());   
    
        form_data.append("codigo_insercion_1", $("#codigo_insercion_1").val());
        form_data.append("codigo_insercion_2", $("#codigo_insercion_2").val());
        form_data.append("codigo_insercion_3", $("#codigo_insercion_3").val());
        form_data.append("codigo_insercion_4", $("#codigo_insercion_4").val());
        form_data.append("codigo_insercion_5", $("#codigo_insercion_5").val());
        form_data.append("codigo_insercion_6", $("#codigo_insercion_6").val());
        form_data.append("codigo_insercion_7", $("#codigo_insercion_7").val());
        form_data.append("codigo_insercion_8", $("#codigo_insercion_8").val());
  
        
        if( $("#borrador").prop("checked") == true){
            borrador = "SI";
        }else{
            borrador = "NO";
        }
        
   
        form_data.append("borrador", borrador);
        form_data.append("video", $("#video").val());
        form_data.append("video_facebook", $("#video_facebook").val());
    
        var inputFileImage = document.getElementById("archivo_portada");
        if(inputFileImage.files[0] != undefined){
            form_data.append("archivo_portada", inputFileImage.files[0]);
        }
       var archivo_mp3 = document.getElementById("archivo_mp3");
        if(archivo_mp3.files[0] != undefined){
            form_data.append("archivo_mp3", archivo_mp3.files[0]);
        }   
    
    
        $.ajax({
        
            url:post_url,
            type:request_method,
            contentType:false,        
            data:form_data,
            processData:false,
            cache:false,
            dataType: 'json',
            success : function(datos) {		
            console.log(datos);
                
            if(datos.error=="undefined"){
                alert("HA OCURRIDO UN ERROR AL GUARDAR "+datos.error);
                $("#btnenviararticulo").removeAttr("disabled");
                return false;
             }  
             
             if($("#borrador").prop("checked") == false){
            
               if(datos.resultado == 'ok'){
                   location.href="consulta_noticias.php";
               }else{
                    $("#btnenviararticulo").removeAttr("disabled");
               }  
            }else{
                alert(datos.mensaje);
                $("#btnenviararticulo").removeAttr("disabled");
                if(datos.resultado == 'ok'){                                 
              
                    $("#subir_noticias_principal").append('<input type="hidden" id="id" name="id" value=""/>');
                    $("#id").val(datos.id);
                    $(".vistaprevia").attr("href","https://"+document.domain+'/blog/'+datos.titulo);
                   
              }  
          
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $("#cargando").html("Status: " + textStatus+ ", Error: " + errorThrown); 
             $("#cargando").css("display","none");
            $("#cargando").attr("class","error");
            $("#btnenviararticulo").removeAttr("disabled");
        }

    });  

}
function cerrar_sesion_facebook(){
        //FACEBOOK
   
  window.fbAsyncInit = function() {//ESTE SE INICIALIZA EN ACCION.JS Y SE CREA FUNCION, DE cerrar_sesion_facebook() se llama con onclick en el menu cerrar sesion
    FB.init({
      appId      : '1569458539878898',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v8.0'           // Use this Graph API version for this call.
    });

      FB.logout(function() { });
  
  
      //FIN FACEBOOK
    
};
    

location.href="https://"+document.domain+"/sesionconfirma?close=1";
    
}

function subir_imagen_noticias(){
    
    	//GUARDAR

    //$("#idclock").css("display","block");
    var post_url = $("#subir_fotos_adicionales").attr("action"); //get form action url
    var request_method = $("#subir_fotos_adicionales").attr("method"); //get form GET/POST method
    //var form_data = $("#subir_noticia").serialize(); //Encode form elements for submission


    var f=new Date();
    cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds(); 	

    var inputFileImage = document.getElementById("archivo");
    var data = new FormData();
    
    for(i=0;i<inputFileImage.files.length;i++){
        data.append("archivo"+i,inputFileImage.files[i]);
    }
//    data.append("archivo1",inputFileImage.files[1]);


//    var url = "../productos/insertar_modificar.php?id="+cad;

    $.ajax({
        beforeSend: ver_imagen_envio(),
        
        url:post_url,

        type:request_method,

        contentType:false,

        data:data,

        processData:false,

        cache:false,

        success : function(datos) {		
           
            if(datos=="tipo"){
                alert("seleccione una foto formato JPG");
                 $("#cargando").html("Seleccione una foto formato JPG");

                $("#cargando").removeAttr("class","correcto");
                $("#cargando").attr("class","error");

                return false;
            }else{ 
                //alert("entra");
                datosnuevos = "<div style='font-size:20px;'>Nuevos</div>"+datos;
                //alert(datosnuevos);
                $(".galeria_imagenes_temporales1").html(datosnuevos);
//                $(".galeria_imagenes_temporales1").html("");
//                datos_imagenes_temporales = datos_imagenes_temporales+datos;
                //$(datos).insertAfter(".galeria_imagenes_temporales1");
                $("#cargando").css("display","none");
                $("#cargando").html("");

                $("#cargando").removeAttr("class","error");
                $("#cargando").attr("class","correcto");
            }



        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $("#cargando").html("Status: " + textStatus+ ", Error: " + errorThrown); 
             $("#cargando").css("display","none");
            $("#cargando").attr("class","error");
        }

    });  

}

function ver_imagen_envio(){
    $("#cargando").html("cargando...!");
    $("#cargando").css("display","block");
    $("#cargando").attr("class","correcto");
}
function eliminar_articulo(id){
    if (confirm('¿Está seguro que deseas eliminar el articulo seleccionado?')) {
       location.href="../blog/eliminar.php?id="+id;
    }
}
function eliminar_categoria(id){
    if (confirm('¿Está seguro que deseas eliminar la categoria seleccionada?')) {
       location.href="../categorias_blog/eliminar.php?id="+id;
    }
}