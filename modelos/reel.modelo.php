<?php

require_once "conexion.php";

class ModeloReels{

	/*=============================================
	MOSTRAR REEL
	=============================================*/

	static public function mdlIngresarReel($tabla, $datos){
    
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
		(link) 
		VALUES (:link)");

		$stmt->bindParam(":link", $datos["link"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();		
		$stmt = null;

	}



	/**********************
	 TRAER REEL
	**********************/

	static public function mdlMostrarReels($tabla) {

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
	 BORRAR REEL
	**********************/

	static public function mdlBorrarReel($tabla, $item, $valor){

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