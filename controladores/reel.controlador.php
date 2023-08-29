<?php

class ControladorReels{
    
	/*=============================================
				SUBIR REEL
	=============================================*/  
	static public function ctrAgregarReel() {    
		  
			 if(isset($_POST['btnSubirReel'])){

				$tabla = "reels";

				$datos = array(
					"link" => $_POST["link"]
				);


				$respuesta = ModeloReels::mdlIngresarReel($tabla, $datos);
				
					if($respuesta == "ok"){

						echo '<script>         
								swal({
									title: "Reel agregado!",
									text: "EL Reel fue guardado satisfactoriamente!",
									type: "success",
									icon: "success",
								}).then(function() {
									window.location = "../reel";
								});
								
							</script>';

					}			   
			 
			 }
	}
	
	/**************************************
	 MOSTRAR REEL
	***************************************/
	static public function ctrMostrarReels(){
		
		$tabla = "reels";

		$respuesta = ModeloReels::mdlMostrarReels($tabla);

		return $respuesta;

	} 

	/**************************************
	 BORRAR REEL
	***************************************/
	static public function ctrBorrarReel(){

		if(isset($_GET["idReel"])){


			$valor = $_GET["idReel"];
			$item = "id";
			$tabla = "reels";

			$respuesta = ModeloReels::mdlBorrarReel($tabla, $item, $valor);

			if($respuesta == "ok"){

				echo '<script>  
				
					swal({
						title: "Reel eliminado!",
						text: "El Reel fue borrado satisfactoriamente!",
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