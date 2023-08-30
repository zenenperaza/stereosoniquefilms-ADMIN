<?php

class ControladorContents{

    
	/*=============================================
				SUBIR Content
	=============================================*/  
	static public function ctrCrearContent() {     
		  
		if(isset($_POST['btnCrearContent'])){		
		
			// IMAGEN
			if(isset($_FILES["imagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO
				=============================================*/

				$directorio = "vistas/img/contents/";

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

					$ruta = "vistas/img/contents/".$imagen;			

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

					$ruta = "vistas/img/contents/".$imagen;

					$origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			} 
			

			$tabla = "contents";

			$datos = array(
				"titulo" => $_POST["titulo"],
				"descripcion" => $_POST["descripcion"],
				"cargo" => $_POST["cargo"],
				"imdb" => $_POST["imdb"],
				"trailer" => $_POST["trailer"],
				"imagen" => $imagen
			);


			$respuesta = ModeloContents::mdlIngresarContent($tabla, $datos);
			
			if($respuesta == "ok"){

				echo '<script>         
						swal({
							title: "Content agregado!",
							text: "EL Content fue guardado satisfactoriamente!",
							type: "success",
							icon: "success",
						}).then(function() {
							window.location = "../contents";
						});
						
					</script>';

			}

		
		
		}
	}
	
	/**************************************
	 MOSTRAR Content
	***************************************/
	static public function ctrMostrarContents(){
		
		$tabla = "contents";

		$respuesta = ModeloContents::mdlMostrarContents($tabla);

		return $respuesta;

	} 

	/**************************************
	 BORRAR content
	***************************************/
	static public function ctrBorrarContent(){

		if(isset($_GET["idContent"])){

			$tabla ="contents";

			$item = "id";
			$valor = $_GET["idContent"];	
			
			unlink('vistas/img/contents/'.$_GET["rutaImagen"]);      

			$respuesta = ModeloContents::mdlBorrarContent($tabla, $item, $valor);

			if($respuesta == "ok"){

				echo '<script>  
				
				swal({
					title: "Content eliminado!",
					text: "El Content fue borrado satisfactoriamente!",
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