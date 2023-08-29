<?php

class ControladorWorks{

    
	/*=============================================
				SUBIR WORK
	=============================================*/  
	static public function ctrNuevoWork() {     
		  
		if(isset($_POST['btnSubirWork'])){		
		
			// IMAGEN
			if(isset($_FILES["imagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/img/works/";

				if (!file_exists($directorio)) {
					mkdir($directorio, 0777, true);
				};

				

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["imagen"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$times = time();

					$imagen = $times.".jpg";

					$ruta = "vistas/img/works/".$imagen;

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, true);
					};

					$origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}
				
				
				if($_FILES["imagen"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$times = time();

					$imagen = $times.".png";

					$ruta = "vistas/img/works/".$times.".png";

					$origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			} 
			
			// VIDEO			   
			if(isset($_FILES["video"]["tmp_name"]) && !empty($_FILES["video"]["tmp_name"])){
				 
				$micarpeta = "vistas/videos/works/";

				if (!file_exists($micarpeta)) {
					mkdir($micarpeta, 0777, true);
				};
		 
				 $maxsize = 70000000; // 70MB
				 $nombre_file = $_FILES['video']['name'];
				 $image_info = explode(".", $nombre_file); 
				 $image_type = end($image_info);
				 $file_video = time().".".$image_type;
				 $target_dir = $micarpeta;
				 $target_file = $target_dir.$file_video;
	 
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
							title: "Error al subir Video. Debe ser menor de 70mb",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result) {
										if (result.value) {
	
										history.back();
	
										}
									})
	
						</script>';
					}else{
				
						move_uploaded_file($_FILES['video']['tmp_name'],$target_file);
					 
					}
	 
					 $error= "la extension del archivo es invalido.";
				 } 
			}

			$tabla = "works";

			$datos = array(
				"titulo" => $_POST["titulo"],
				"artista" => $_POST["artista"],
				"informacion" => $_POST["informacion"],
				"link" => $_POST["link"],
				"imagen" => $imagen,
				"video" => $file_video
			);


			$respuesta = ModeloWorks::mdlIngresarWork($tabla, $datos);
			
			if($respuesta == "ok"){

				echo '<script>         
						swal({
							title: "Work agregado!",
							text: "EL Work fue guardado satisfactoriamente!",
							type: "success",
							icon: "success",
						}).then(function() {
							window.location = "../work";
						});
						
					</script>';

			}

		
		
		}
	}
	
	/**************************************
	 SUBIR WORK
	***************************************/
	static public function ctrMostrarWorks(){
		
		$tabla = "works";

		$respuesta = ModeloWorks::mdlMostrarWorks($tabla);

		return $respuesta;

	} 

	/**************************************
	 BORRAR WORK
	***************************************/
	static public function ctrBorrarWork(){

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