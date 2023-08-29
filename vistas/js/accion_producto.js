$(document).ready(function(){
     $("#lista_tallas").on('click', '.click_talla', function(){
        modelo = $("#modelo").val();
        talla = $(this).val();
         $("#formcolores").find(':input').each(function() {//añade todos los elementos que son inputs
         var elemento= this;
         if(elemento.Type="radio"){// que son de tipo radio
           if($("#"+elemento.id).prop("checked")){
              color = $("#"+elemento.id).val();
//              alert("click en talla, talla="+talla+",color="+color);       
              datos_producto(modelo,color,talla);
           }
         }    
               
     });
      
        
    }); 
    

    
    
    $(".click_color").click(function(){
        
            modelo = $("#modelo").val();
            color = $(this).val();

            datos_talla_producto(modelo,color);

       
    });
    $(".cantidad_producto").change(function(){
        
          if(parseInt($(this).val()) < parseInt($(this).attr("min"))){
              alert("La compra minima de este producto es de "+$(this).attr("min"));
              $(this).val($(this).attr("min"));
          }

       
    });
    
});
function datos_producto(modelo,color, talla){
        
          $.ajax({        
            url:"inclusion/funciones.php",
            type:"POST",                
            data:{formulario:"cargar_producto",modelo: modelo,color: color,talla: talla},                   
            dataType: 'json',
            cache:false,
            success : function(datos) {		
//                console.log(JSON.stringify(datos));
                if(!datos.error){
                    console.log(datos);
                    
                    location.href = "producto-"+datos[0].url_mostrada+"-decolor-"+color+"-detalla-"+talla;

                }else{
                    console.log(datos.error," No hay");
                }             

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
             alert("XMLHttpRequest: "+JSON.stringify(XMLHttpRequest)+", Status: " + textStatus+ ", Error: " + errorThrown); 
    
        }
        
        
    });
}
function datos_talla_producto(){
            $.ajax({        
            url:"inclusion/funciones.php",
            type:"POST",                
            data:{formulario:"cargar_talla_producto",modelo: modelo,color: color},                   
            dataType: 'json',
            cache:false,
            success : function(datos) {		
//                console.log(JSON.stringify(datos));
                if(!datos.error){
//                    console.log(datos);
                  
                    var ul = document.getElementById("lista_tallas");
                    ul.innerHTML="";
                    for(i=0;i < datos.length;i++){
//                        console.log("i="+datos[i].tallas);
                         var li = document.createElement("li");
                        texto="<label><input type='radio' name='tallas' id='talla_"+i+"' class='click_talla' value='"+datos[i].tallas+"' ><span>"+datos[i].tallas+" </span> </label>";
                    
                      li.innerHTML=texto;
//                      li.setAttribute("id", "talla_"+i); // added line
                      ul.appendChild(li);
                        
                        
                        
                    }
//                    alert(datos.nombre);
//                    $("#nombre_producto").html(datos[0].nombre);
                }else{
                    console.log(datos.error," No hay");
                }
//           alert(datos.modelo+","+datos.talla+","+datos.color);
             

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
             alert("XMLHttpRequest: "+JSON.stringify(XMLHttpRequest)+", Status: " + textStatus+ ", Error: " + errorThrown); 
    
        }
        
        
    });
}