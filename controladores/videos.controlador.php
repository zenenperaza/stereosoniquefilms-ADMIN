<?php

class ControladorVideos{

    
/*=============================================
			SUBIR VIDEO
=============================================*/
  
	static public function ctrSubirVideo() {    
    
		  
			 if(isset($_POST['btnSubirVideo'])){
			   
	        //    var_dump($_FILES["video"]);
	        //    return;
			   
			   if(isset($_FILES["video"]["tmp_name"]) && !empty($_FILES["video"]["tmp_name"])){
				 
				$micarpeta = "vistas/videos/";
				   if (!file_exists($micarpeta)) {
					   mkdir($micarpeta, 0777, true);
				   };
		 
				 $maxsize = 70000000; // 70MB
				 $nombre_file = $_FILES['video']['name'];
				 //
				 $image_info = explode(".", $nombre_file); 
		   // 				$nombre =format_uri($image_info[0]);
				 $image_type = end($image_info);
				 $file_video = time().".".$image_type;
				 //
				 $target_dir = $micarpeta;
				 $target_file = $target_dir.$file_video;
	 
				 // Obtenemos la extension del archivo
				 $videoFileType = strtolower(pathinfo($nombre_file,PATHINFO_EXTENSION));
	 
				 // extensiones validados
				 $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
	 
				 // Revisar extension
				 if( in_array($videoFileType,$extensions_arr) ){

					 
					 // Revisar el tamaño del archivo
					 if(($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
							echo '<script>
	 
						 swal({
							   type: "success",
							   title: "Error al subir Video. Debe ser menor de 20mb",
							   showConfirmButton: true,
							   confirmButtonText: "Cerrar"
							   }).then(function(result) {
										 if (result.value) {
	 
											history.back();
	 
										 }
									 })
	 
						 </script>';
					 }else{
						 // Subir
						 if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
							//    $nombreVideo = strtoupper ( $_POST["nombreVideo"] );
							   $tabla = "videos";
								$video = $file_video;
								   
						   
							 $respuesta = ModeloVideos::mdlSubirVideo($tabla, $video);
	 
						   if($respuesta="ok"){
	 
							  echo '<script>
	 
						 swal({
							   type: "success",
							   title: "El video ha sido subido correctamente",
							   showConfirmButton: true,
							   confirmButtonText: "Cerrar"
							   }).then(function(result) {
										 if (result.value) {
	 
												 history.back();
	 
	 
										 }
									 })
	 
						 </script>';
			   
						   } 
					 
	 
						 }
					 }
	 
					 $error= "la extension del archivo es invalido.";
				 } 
			 }
			 
			 }
	   }


		/**************************************
		 TRAER videos
		***************************************/
		static public function ctrMostrarVideos(){
			
			$tabla = "videos";

			$respuesta = ModeloVideos::mdlMostrarVideos($tabla);

			return $respuesta;

		} 


		static public function ctrBorrarVideo(){

			if(isset($_GET["idVideo"])){

				$tabla ="videos";
				$item = "id";
				$valor = $_GET["idVideo"];				
	
				function rrmdir($dir) { 
					if (is_dir($dir)) { 
					  $objects = scandir($dir); 
					  foreach ($objects as $object) { 
						if ($object != "." && $object != "..") { 
						  if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
						} 
					  } 
					  reset($objects); 
					  rmdir($dir); 
					} 
				  } 

				  unlink('vistas/videos/'.$_GET["rutaVideo"]);      
	
				$respuesta = ModeloVideos::mdlBorrarVideo($tabla, $item, $valor);
	
				if($respuesta == "ok"){
	
					echo '<script>  
					
					swal({
						title: "Video eliminado!",
						text: "El Video fue borrado satisfactoriamente!",
						type: "success",
						icon: "success"
					}).then(function() {
						history.back();
					});               
					  
				  </script>';
			
	
				}	

		}

	}
      

}