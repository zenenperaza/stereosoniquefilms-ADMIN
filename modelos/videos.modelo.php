<?php

require_once "conexion.php";

class ModeloVideos{

	/*=============================================
	MOSTRAR CASOS
	=============================================*/

	static public function mdlSubirVideo($tabla, $video){
    
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( `video`) VALUES (:video)");

		$stmt->bindParam(":video", $video, PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt = null;
	

		}



		/**********************
		 TRAER VIDEOS
		**********************/

		static public function mdlMostrarVideos($tabla) {

			$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			if ($stm->execute()) {
				return $stm->fetchAll();
			} else {
				return "error";
			}
			$stm->close();
			$stm = null;

		}




		/**********************
		 BORRAR VIDEOS
		**********************/

		static public function mdlBorrarVideo($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
	
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
	
			if($stmt -> execute()){
	
				return "ok";
			
			}else{
	
				return "error";	
	
			}
	
			$stmt -> close();
	
			$stmt = null;
	
	
		}




}  // FIN DE OBJETO