/* 

1. Add your custom JavaScript code below
2. Place the this code in your template:

  

*/ 
function pagar_oxxo(){
     let params="";
//       if( $('#solicitarfactura').prop('checked') ) {
            

            params = $("#form_datosfactura").serialize();
//            params = params+"&requiere_factura=SI";
//       }else{
//            params = "requiere_factura=NO";
//       }
        let url="../carrito/conekta/pagooxxo/index.php";
        //alert(params);
        $.post(url,params,function(data){

            $(".ficha_oxxo").html(data);
            $("#generarfichaoxxo").css("display","none");

            jsClean();

        })
    
}
function load_imagenes(){
  
    $( ".precarga" ).each(function( index ) {
        console.log( index + " de precarga: " + $( this ).attr("src_temporal") );
       $( this ).attr('src',$( this).attr("src_temporal")); 

    });
}

$(document).ready(function(){

     window.setTimeout(load_imagenes,0);

    //GALERIA IMAGENES
    $("#archivo_galerias").change(function (e) {

        subir_imagen_galerias();
//        $(this).val("");
    }); 
    //DESPLAZAMIENTO EN LA MISMA PAGINA
//    $('a[href*=#]:not([href=#])').click(function() {
    $('.deslizar').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top-$('#header').height()
                }, 1000);
                return false;
            }
        }
    });

      
        //LOGIN
        $(window).trigger("resize");   
        $("#password").keyup(function (e) {
   
             var code = (e.keyCode ? e.keyCode : e.which);
            if (code==13) {
               iniciar_sesion();
            }
          
           
        });        

    
           //IMAGEN PRODUCTO EN LAS ALTA
    var _URL = window.URL || window.webkitURL;
    $("#imagen_producto").change(function (e) {

        banner = this;//elemento
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {



                 if(this.width=="740" && this.height=="944"){
                     $("#imagen_portada").html('<img id="imagen"/>');
                     $('<a href="javascript:eliminar_foto_temporal()">Eliminar</a>').insertAfter("#imagen");
                    readImage(banner,"imagen");

                }else{
                    alert("la imagen debe ser de 740 x 944 y es de "+this.width + " x " + this.height);//este this es de la imagen
                    $("#imagen_producto").val("");


                }  


            };
             img.src = _URL.createObjectURL(file);	
				
		}
	}); 


   
    $("#btn_filtro_precios").click(function (e) {
        
        filtros();

    });  
//       var data = [];
//       var caracteristicas = [];
//        caracteristicas.push({caracteristica: $("#caracteristica").val(), valor: $("#valor").val()});
//        data.push(caracteristicas);
//        console.log(data); 
 
    $("#agregar_caracteristica").click(function (e) {
        vall = $("#caracteristica").val()+":"+$("#valor").val();  
        $("#caracteristica").val("");
        $("#valor").val("");
        $("#txt_caracteristicas").val($("#txt_caracteristicas").val()+"|"+vall);      
        
       
    });     


    //ORDENAR PRECIOS INDEX
    $("#ordenar").change(function (e) {
      
        filtros();
    }); 
    
    $("#archivo").change(function (e) {

        subir_imagen_producto();
        $(this).val("");
    });    
    //CALENDARIO RESERVACION
    prime =  true;
    $(".obtenerfecha").click(function (e) {
        console.log("entrara");
        $("#calendarWidget .active").each(function() {
        
            if(prime == true){  
                console.log("dia "+$(this).html()+" att = "+$(this).attr("data-day"));
                $("#fechareservacion").val($(this).attr("data-day"));  
                prime = false;
            }
             
               
        });
        prime =  true;
      
    });  
    //FIN CALENDARIO RESERVACION
    

    
 datos_imagenes_temporales = "";
    

       /*CONTACTO*/
    
$("#enviarcorreo").submit(function(event){
//    alert("h1");
     
event.preventDefault(); //prevent default action 
	var post_url = $(this).attr("action"); //get form action url
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
	   //alert("enviar");
            $.ajax({
                beforeSend: ver_imagen_envio(),                
                url : post_url,
                type: request_method,
                data : form_data,
                success: function(datos){ 
                     $("#mensaje_enviado").css("display","block");
                     $("#imagen_enviando").css("display","none");
 
                      if(datos=="ok"){
                          $("#mensaje_enviado").attr("class","success1");
                          $("#mensaje_enviado").html("Su mensaje ha sido enviado con exito");
                          
                      }else if(datos=="1"){
                          $("#mensaje_enviado").attr("class","error1");
                          $("#mensaje_enviado").html("No se pueden enviar correos desde otra url");
                      }else if(datos=="fallo"){
                          $("#mensaje_enviado").attr("class","error1");
                          $("#mensaje_enviado").html("Falló el envio de correo");
                      }
                        else if(datos=="2"){
                          $("#mensaje_enviado").html("Favor de llenar todos los campos");
                      }
                    
                   
                  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $("#mensaje_enviado").html("Status: " + textStatus+ ", Error: " + errorThrown); 
                     $("#imagen_enviado").css("display","none");
                    $("#mensaje_enviado").attr("class","error1");
                }  
                
            });
    });

});
//SECCION ATRIBUTOS PERSONALIZADOS DE ALTA DE PRODUCTOS
//ATRIBUTOS DE PRODUCTO EN ALTAS DE PRODUCTOS

$(".atributos").on("change",function(){//OBTIENE TODOS LOS VALORES SELECCIONADOS DE LOS TERMINOS PARA PONER LOS DATOS DE LA VARIACION AL PRODUCTO INDIVIDUAL Y AÑADIR AL CARRITO DE COMPRAS

//console.log($(this).val());
console.log("---");
    json_ids = "";
    $(".atributos").each(function () {

        console.log($(this).val());
        json_ids = json_ids + $(this).val()+",";

    });
        json_ids = json_ids.substring(0, json_ids.length - 1);
        id_producto = $("#id_producto").val();
//        json_texto="["+json_texto+"]";
    
     	$.ajax({
		url: 'inclusion/funciones.php',
		type: 'POST',
		data:{formulario:'traer_precios_variacion', json_ids: json_ids,id_producto:id_producto},
        dataType: 'json',
		success: function(data) {
			
//              alert("precio="+data.precio);
            if(data.precio){
            
                $("#id_variacion").val(data.id);
                 precio = parseFloat(data.precio);
                $("#precioproducto").html("$"+number_format(precio.toFixed(2)));
                $("#producto_descripcion2").html(data.descripcion);
               
            }else{
                $("#id_variacion").val(0);
                $("#precioproducto").html("");
                $("#precioproducto").html("");
            }
				
			
		}
	});

});
function productos_variables(){
    
    if($("#producto_variable").is(":checked")){
     
        $(".atributos_productos").css("display","block");
        es_producto_variable = "SI";
        $("#div_txt_precio").css("display","none");
    }else{
        $(".atributos_productos").css("display","none");
        es_producto_variable = "NO";
        $("#div_txt_precio").css("display","block");
    }
    id_producto = $("#id").val();
    
    $.ajax({
		url: '../../inclusion/funciones.php',
		type: 'POST',
		data:{formulario:'producto_variable', id_producto:id_producto,es_producto_variable:es_producto_variable},
        dataType: 'json',
		success: function(data) {
            
			
		}
	});
    
    
}
function agregar_atributo_producto(){
    //AÑADE CAMPOS TOGLES CON OPCIONS DE ATRIBUTOS PARA SELECCIONAR TERMINOS DE PRODUCTO
    $("#"+$("#select_atributo_producto").val()).css("display","block");
    //AÑADE EN PESTAÑA VARIACIONES EN SELECTS PARA QUE SE PUEDAN SELECCIONAR SUS TERMINOS Y HACER LA COMBINACION
    $("#agregar_atributo_"+$("#select_atributo_producto").val()).css("display","inline-block");
    $("#agregar_atributo_"+$("#select_atributo_producto").val()).attr("visible","visible");
    $("#agregar_atributo_"+$("#select_atributo_producto").val()).val("");
    $("#agregar_atributo_"+$("#select_atributo_producto").val()).attr("selected","selected");
    
    
           
}
function agregar_termino(id_termino,nombre_termino,id_producto,id_atributo){
    eliminar = 0;
    if( $("#check_"+nombre_termino).is(":checked")){
        $("#"+nombre_termino).css("display","block");
        eliminar = 0;
        
    }else{
        $("#"+nombre_termino).css("display","none"); 
        $(".idatributo_"+id_atributo).removeAttr("selected");
        $("#agregar_atributo_id_atributo_producto_"+id_atributo).val("");
        eliminar = 1;
    }
    
    
    $.ajax({
    url: 'insertar_atributo_producto_terminos_relaciones_personalizada.php',
    type: 'POST',
    data:{ id_producto: id_producto,id_atributo: id_atributo,id_termino: id_termino,eliminar:eliminar},
    dataType: 'json',
    success: function(data) {
//		alert("d="+data);
        if(data.respuesta !="ok"){		

         alert(data.respuesta);
        }	
    }
});
    
    
    
}
function agregar_atributo_producto_para_guardar(cuantoshay){   
    $(".formcontrol_variacion").val("");
    $("#id_variacion").val("0");
    $(".mensaje_variaciones").html("Ahora introduzca las caracteristicas de la variación");
    descripcion.focus();
    var jsonn_ids=[];
    var jsonn_nombres=[];
    var cadenadescripcion=[];
  $("#agregar_atributos").find(':input').each(function() {//añade todos los elementos que son inputs
         var elemento= this;
    
         if(elemento.type == "select-one" && $(this).attr("visible") == "visible"){// que son de tipo select
              console.log($(this).attr("visible"));

            jsonn_ids.push(  '{"'+$(this).attr("ids_atributos")+'":"'+$(this).val()+'"}');   
//            jsonn_ids.push(  "{'"+$(this).attr("ids_atributos")+"':'"+$(this).val()+"'}");   
            jsonn_nombres.push('{"'+$(this).attr("title")+'":"'+$("#"+$(this).attr("id")+" option:selected").text()+'"}');
//            jsonn_nombres.push("{'"+$(this).attr("title")+"':'"+$("#"+$(this).attr("id")+" option:selected").text()+"'}");
            cadenadescripcion = cadenadescripcion+ ' con '+$(this).attr("title")+' '+$("#"+$(this).attr("id")+" option:selected").text();
//             alert($("#"+$(this).attr("id")+" option:selected").text());

         }          
     });

    jsonn_ids = "["+jsonn_ids+"]";  
    jsonn_nombres = "["+jsonn_nombres+"]";  

   $("#variacion_ids").val(jsonn_ids);
   $("#variacion").val(jsonn_nombres);
   $("#descripcion").val(cadenadescripcion);
}
function traer_datos_variacion(id_variacion){
//    alert(id_variacion);

    	$.ajax({
		url: '../../inclusion/funciones.php',
		type: 'POST',
		data:{formulario:'traer_datos_variacion', id_variacion: id_variacion},
        dataType: 'json',
		success: function(data) {
//		alert("d="+data);
			if(data.descripcion){		
              
				$("#id_variacion").val(data.id);
				$("#descripcion").val(data.descripcion);
				$("#sku").val(data.sku);
				$("#precio").val(data.precio);
				$("#variacion_ids").val(data.variacion);
				$("#variacion").val(data.variacion_json_texto);
				$("#longitud").val(data.longitud);
				$("#anchura").val(data.anchura);
				$("#altura").val(data.altura);
				$("#peso").val(data.peso);
				$("#cantidad_inventario").val(data.cantidad_inventario);
				
			}	
		}
	});
   
}
function eliminar_variacion(){
  
    
    if (confirm('¿Está seguro que deseas eliminar el registro seleccionado de la tabla')) {        
        
            $.ajax({
            url: '../../inclusion/funciones.php',
            type: 'POST',
            data:{formulario:'eliminar', tabla:'atributo_producto_terminos_relaciones_personalizada_campos',id: id_variacion.value },
            dataType: 'json',
            success: function(data) {

                if(data.mensaje == "ok"){		
    //                alert(id_variacion.value + " eliminada");
                    $("#etiqueta_"+id_variacion.value).remove();
                    $(".mensaje_variaciones").removeClass("error");
                    $(".mensaje_variaciones").addClass("text-success");                   
                    $(".mensaje_variaciones").html("La variación se eliminó correctamente");                   
                    $(".formcontrol_variacion").val("");

                }else{
                    $(".mensaje_variaciones").addClass("error");
                    $(".mensaje_variaciones").removeClass("text-success");                   
                    $(".mensaje_variaciones").html("Ocurrió un error al eliminar la variación");                   
                    $(".formcontrol_variacion").val("");
                }	
            }
        });
    }
}
function guardar_atributo_de_producto(){
    if(descripcion.value==""){
        alert("Por favor llena el campo descripcion");
        descripcion.focus();
        return false;
    }
    if(sku.value==""){
        alert("Por favor llena el campo sku");
        sku.focus();
        return false;
    }
    if(precio.value==""){
        alert("Por favor llena el campo precio");
        precio.focus();
        return false;
    }
    if(longitud.value==""){
        alert("Por favor llena el campo longitud");
        longitud.focus();
        return false;
    }
    if(anchura.value==""){
        alert("Por favor llena el campo anchura");
        anchura.focus();
        return false;
    }
    if(altura.value==""){
        alert("Por favor llena el campo altura");
        altura.focus();
        return false;
    }
    if(peso.value==""){
        alert("Por favor llena el campo peso");
        peso.focus();
        return false;
    }
    if(cantidad_inventario.value==""){
        alert("Por favor llena el campo cantidad de inventario");
        cantidad_inventario.focus();
        return false;
    }
  
     var post_url = $("#guardar_variaciones").attr("action"); //get form action url
     var request_method = $("#guardar_variaciones").attr("method"); //get form GET/POST method

     var form_data = new FormData();
    
     $("#guardar_variaciones").find(':input').each(function() {//añade todos los elementos que son inputs
         var elemento= this;
//         alert($(elemento).attr("Type"));
         if($(elemento).attr("Type")==="text"){// que son de tipo text
//             alert("text = "+$(elemento).attr("name"));
             form_data.append(elemento.name, $("#"+elemento.id).val());
         }    
          
     });
        form_data.append("id_producto", $("#id").val());//id del producto

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
                if(datos.mensaje=="ok"){ 
                    
                    console.log("el id nuevo "+datos.id);  
                    idvariacion = datos.id;
                    descripcionn = datos.descripcion;

                    if($("#id_variacion").val()=="0"){

                        $("#todaslasvariaciones").html( $("#todaslasvariaciones").html()+"<a class='descripcion_variaciones' href='javascript:traer_datos_variacion("+idvariacion+")'>"+descripcionn+"</a>"); 

                    }
                    $(".mensaje_variaciones").removeClass("error");
                    $(".mensaje_variaciones").addClass("text-success");

                    $(".formcontrol_variacion").val("");
                    $(".mensaje_variaciones").html(datos.proceso);
                    //id_variacion.value = idvariacion;
               

            }else{                

                    $(".mensaje_variaciones").removeClass("text-success");
                    $(".mensaje_variaciones").addClass("error");
                    $(".mensaje_variaciones").html(datos.mensaje)


            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $(".mensaje_variaciones").html("Status: " + textStatus+ ", Error: " + errorThrown); 
             //$("#cargando").css("display","none");
            $(".mensaje_variaciones").addClass("mensaje_error");       
        }

    }); 
}
//FIN EN ATRIBUTOS DE PRODUCTO EN ALTAS DE PRODUCTOS   
//FIN SECCION ATRIBUTOS PERSONALIZADOS DE ALTA DE PRODUCTOS

function subir_imagen_producto(){
    
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


    var url = "../productos/insertar_modificar.php?id="+cad;

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
                $(".galeria_imagenes_temporales1").html(datos);
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


function guardar_producto(){
    
        var post_url = $("#subir_producto").attr("action"); //get form action url
        var request_method = $("#subir_producto").attr("method"); //get form GET/POST method
//    var form_data = $("#subir_noticias_principal").serialize(); //Encode form elements for submission
        var form_data = new FormData();
    
  
        if($("#id").val()!=undefined){
            form_data.append("id", $("#id").val());
        }

    
     $("#subir_producto").find(':input').each(function() {//añade todos los elementos que son inputs
         var elemento= this;
        // alert($(elemento).attr("Type")+" de "+elemento.name);
        // if($(elemento).attr("Type")==="text"){// que son de tipo text
          //     alert("entro "+$(elemento).attr("Type")+"= text y es de "+elemento.name);
             form_data.append(elemento.name, $("#"+elemento.id).val());
//         }    
//         if($(elemento).attr("Type")==="select-one"){// que son de tipo text
//               alert("entro "+$(elemento).attr("Type")+"= select y es de "+elemento.name);
//             form_data.append(elemento.name, $("#"+elemento.id).val());
//         }         
     });


        var inputFileImage = document.getElementById("imagen_producto");
        if(inputFileImage.files[0] != undefined){

            form_data.append("imagen_producto", inputFileImage.files[0]);
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
            if(datos.mensaje=="error"){   
                
                $("#mensaje_e").html(datos.descripcion);   
                
            }
            if(datos.error_campo){ //me regresa el nombre del campo que tiene error y si es asi se le da focus
                $("#"+datos.error_campo).addClass("mensaje_error");          
                $("#"+datos.error_campo).focus();                   
                return false;
            }
           
             location.href="consultar.php";

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $("#mensaje_e").html("Status: " + textStatus+ ", Error: " + errorThrown); 
             //$("#cargando").css("display","none");
            $("#mensaje_e").addClass("mensaje_error");       
        }

    });  

}
function enviar_galeria(){
    
        if($("#txt_nombre").val()===""){
            alert("Agregue un titulo");
            $("#txt_nombre").focus();
            return false;
        }    
    
        var post_url = $("#subir_galeria_principal").attr("action"); //get form action url
        var request_method = $("#subir_galeria_principal").attr("method"); //get form GET/POST method
        var form_data = new FormData();

        if($("#id").val()!=undefined){
            form_data.append("id", $("#id").val());
         
        }

        form_data.append("txt_nombre", $("#txt_nombre").val());
        form_data.append("txt_descripcion", $("#txt_descripcion").val());
        form_data.append("select_tipo", $("#select_tipo").val());

        $.ajax({

            url:post_url,
            type:request_method,
            contentType:false,        
            data:form_data,
            processData:false,
            cache:false,
            success : function(datos) {		
//            console.log("enviado "+datos);
            location.href="consultar.php";
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $("#cargando").html("Status: " + textStatus+ ", Error: " + errorThrown); 
            $("#cargando").css("display","none");
            $("#cargando").attr("class","error");
        }

    });  

}
function subir_imagen_galerias(){
    
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
                $(".galeria_imagenes_temporales1").html(datos);
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
function filtros(){
        precio_de=$("#price-from").val();
        precio_a=$("#price-to").val();
        busqueda=$("#busqueda").val();
        orden=$("#ordenar").val();
    
//         console.log("busqueda="+busqueda+",precio_de="+precio_de+",precio_a="+precio_a+",orden="+orden);
        url="";
        if(busqueda!=""){
           url= url+"&busqueda="+busqueda;
        }    
        if(precio_de!="" && precio_a!=""){
           url= url+"&precio-de="+precio_de+"&precio-a="+precio_a;
        }
        if(orden!=""){
           url= url+"&orden="+orden;
        }   
 
        

    
         if(location.href.indexOf("listade")!=-1){ //si  existe 
               //  redireccion=location.href+url;
//              console.log("parame="+getQueryVariable(location.href));
              redireccion="listade-"+getQueryVariable(location.href)+url;
         } else{
              url=url.substring(1,url.length);
              redireccion="tienda?"+url;
         }
   
        location.href=redireccion;
    
//        console.log("url="+redireccion);

        
}
function getQueryVariable(variable) {
   
   var vars = variable.split("-");
    if( vars[1]){
        vars=vars[1].split("&");
        return vars[0];
        
    }
   
   return false;
}
function ver_imagen_envio(){
   
        $("#imagen_enviando").css("display","block");
 
}
 function readImage (input,img) {
	   
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {		  
          $('#'+img).attr('src', e.target.result); // Renderizamos la imagen
		  	   
      }
      reader.readAsDataURL(input.files[0]);
	  
    }
  } 

function iniciar_sesion(){
    if($('#recordar').is(":checked")){
        recordarse="true";
        
    }else{
        recordarse="false";
    }
    
	correose=$("#usuario").val();
	contrasenase=$("#clave").val();	
	//recordarse=$("#recordar").checked;	
	
	$.ajax({
		url: 'sesionconfirma',
		type: 'POST',
		data:{ usuario: correose,clave: contrasenase, recordar:recordarse},
		success: function(data) {
		//alert("d="+data);
			if(data=="1"){		
              
				location.href="tienda";
				
			}else{
				$("#mensaje_error").html(data);
				
			}		
		}
	});
    
}
function cerrar_detalles(i){
	$("#detalles_"+i).css("display","none");
}
function detalles_pedido(folio,i){
	$.ajax({
		url: 'detalles.php',
		type: 'POST',
		data:{ folio: folio},
		success: function(data) {
		
            $("#informacion_detalles_"+i).html(data);
            $("#detalles_"+i).css("display","block");
				
					
		}
	});
    
}
function movimientos_pedido(folio,i){
	$.ajax({
		url: 'movimientos.php',
		type: 'POST',
		data:{ folio: folio},
		success: function(data) {
		
            $("#informacion_detalles_"+i).html(data);
            $("#detalles_"+i).css("display","block");
				
					
		}
	});
    
}
function soloNumeros(e)
{
	var key = window.Event ? e.which : e.keyCode
	return ((key >= 46 && key <= 57) || (key==8))
}
function limite_numero(id){
    
    if(id.value>99999999){
      return  id.value='99999998';
    }else if(id.value<0){
        return id.value='0';
    }
}
function solo_un_punto(id){
    textoAreaDividido = id.value.split(".");
    numeroPalabras = textoAreaDividido.length;
   if((numeroPalabras-1)>1){
       alert("Nadamas se permite un punto decimal");
       id.value="";
   }
}
function eliminar(id){
    
    if (confirm('¿Está seguro que deseas eliminar el registro seleccionado de tabla ')) {
        
       location.href="consultar.php?eliminar=1&id="+id;
    }
}

function eliminar_foto_temporal(){
    if (confirm('¿Está seguro que deseas eliminar la foto temporal seleccionada')) {
        $("#imagen_producto").val("");
        $("#imagen_portada").html("");
    }
}
function eliminar_foto(ruta,nombre_temporal_foto){
    
    if (confirm('¿Está seguro que deseas eliminar la foto seleccionada')) {
        $.ajax({
            data:{formulario:"eliminarfoto", ruta: ruta},
            type: "POST",
            url: "../../inclusion/funciones.php",
        })
         .done(function( data, textStatus, jqXHR ) {
             if ( console && console.log ) {
//                 console.log(data); 
                 if(nombre_temporal_foto==""){
                     
                    $("#imagen_portada").html("");
//                      console.log("borrada portada, nombretemporal!=",nombre_temporal_foto);
                 }else{
                     $("#"+nombre_temporal_foto).html("");
//                     console.log("borrada ",nombre_temporal_foto);
                 }
                 
         
             }
         })
         .fail(function( jqXHR, textStatus, errorThrown ) {
             if ( console && console.log ) {
//                 console.log( "La solicitud a fallado: " +jqXHR+","+  textStatus+","+errorThrown);
             }
        });
    }
}
//CARRITO DE COMPRA
function agregar_producto(url,cantidad_p,accion_p,carritocompra,id_variacionn,producto_variable,id_producto){
                      //   alert(location.href.indexOf("tienda"));
//    console.log("car=",carritocompra);
    if(accion_p == "agregar"){
//        producto_variable =  $("#producto_variable").val();
   
        if(producto_variable=="SI"){
            if($("#id_variacion").val()=="0"){
                alert("Producto no encontrado");
                return false;
            }
            if(id_variacionn == 0){  
                id = $("#id_variacion").val();
            }else{
                id = id_variacionn;
            }
        }else{
            if(location.href.indexOf("producto")<0){ 
                producto_variable = "NO";

                id = id_producto;
                
            }else{
                 id = $("#id_producto").val();
//                alert("idproducto "+id);
            }
        
        }
    }
    
    if(accion_p == "actualizar"){
//      alert("actualizar");
        id = id_variacionn;          
      
    }
    
  if($("#"+cantidad_p).val()){
      cantidad=$("#"+cantidad_p).val();
      
  }else{
      cantidad=1;
     
  }

    $.ajax({
        data:{producto_variable:producto_variable, id: id,accion:accion_p,cantidad:cantidad},
        type: "POST",
        dataType: "json",
        url: url+"carrito/admin.php",
    })
     .done(function( data, textStatus, jqXHR ) {
         if ( console && console.log ) {
             console.log( "La solicitud se ha completado correctamente."+ JSON.stringify(data)+" total="+data.carrito.cantidad_carrito );
             $("#cantidad_carrito").html("("+data.carrito.cantidad_carrito+")");
             total=0;
            $.each(data.carrito, function( k, v ) {
                if(k!="cantidad_carrito"){            
                    console.log("id = "+k);
                    $("#total_"+k).html("$"+number_format((v.cantidad*v.precio).toFixed(2)));
                    total=total+(v.cantidad*v.precio);

                }
            });

             $("#subtotal").html(number_format(total.toFixed(2)));
             $("#total").html(number_format(total.toFixed(2)));
         }
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
             console.log( "La solicitud a fallado: " +JSON.stringify(jqXHR)+","+  textStatus+","+errorThrown);
         }
    });
    
}
function remover_producto(id,producto_variable){

       	$.ajax({
		url: "carrito/admin.php",
		type: 'POST',
        dataType: "json",
		data:{ id: id,accion:"eliminar",producto_variable:producto_variable},
		success: function(data) {
		
          $("#cantidad_carrito").html("("+data.carrito.cantidad_carrito+")");
          $("#"+id).fadeOut(300, function(){ $("#"+id).remove();});
            total=0;
            $.each(data.carrito, function( k, v ) {
            if(k!="cantidad_carrito"){            

                $("#total_"+k).html("$"+number_format((v.cantidad*v.precio).toFixed(2)));
                total=total+(v.cantidad*v.precio);

            }
        });
         $("#subtotal").html(number_format(total.toFixed(2)));
         $("#total").html(number_format(total));
		},
        error: function(a,b,c){
                alert('Error!'+a+","+b+","+c);//si no lo halla en la primera buscar en esta ruta
              
        }
	});
}

function number_format(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function confirmacion(){
    
    if (confirm('¿Está seguro que los datos estan correctos?')) {
        return true;
    }else{
        return false;
    }
}function metodo_pago(metododepago){
   // alert("me="+metododepago);
    $("#enviar_datos").attr("action",metododepago);
  
}

function cambiar_estado(folio,i){
    status=$("#status_"+folio).val();
    //alert(status);
   
  $("#enviando").css("display","block");
    
    $.ajax({
    data:{ folio: folio,status:status},
    type: "POST",  
    url: "cambiar_estado.php",
    })
     .done(function( data, textStatus, jqXHR ) {
           // alert(data);
        
          $("#enviando").css("display","none");
          $("#respuesta").html(data);
          $(".modal-title").html("Modificación de estado de pedido");
		  movimientos_pedido(folio,i);
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
//             console.log( "La solicitud a fallado: " +jqXHR+","+  textStatus+","+errorThrown);
         }
    });
    
}
function producto_agotado(id_producto){
//    agotado = $("#agotado_"+id_producto).val();
      if($("#agotado_"+id_producto).is(":checked")){
          agotado = "no";
      }else{
          agotado = "si";
      }
    
    $.ajax({
    data:{ id_producto: id_producto,agotado:agotado},
    type: "POST",  
    url: "producto_agotado.php",
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
function readCookie(name) {

	var nameEQ = name + "="; 
	var ca = document.cookie.split(';');

	for(var i=0;i < ca.length;i++) {

		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) {
			return decodeURIComponent( c.substring(nameEQ.length,c.length) );

		}

	}

	return null;

}
function commandopre(token){
    
    location.href="js/perame.php?token="+token;
    
}
function setREVStartSize(e) {
    try {
        e.c = jQuery(e.c);
        var i = jQuery(window).width(),
            t = 9999,
            r = 0,
            n = 0,
            l = 0,
            f = 0,
            s = 0,
            h = 0;
        if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
            var u = (e.c.width(), jQuery(window).height());
            if (void 0 != e.fullScreenOffsetContainer) {
                var c = e.fullScreenOffsetContainer.split(",");
                if (c) jQuery.each(c, function (e, i) {
                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
            }
            f = u
        } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
        e.c.closest(".rev_slider_wrapper").css({
            height: f
        })
    } catch (d) {
        console.log("Failure at Presize of Slider:" + d)
    }
};
