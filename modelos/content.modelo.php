<?php

require_once "conexion.php";

class ModeloContents{

	/*=============================================
	MOSTRAR Content
	=============================================*/

	static public function mdlIngresarContent($tabla, $datos){
    
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
		(titulo, cargo, descripcion, imdb, trailer, imagen) 
		VALUES (:titulo, :cargo, :descripcion, :imdb, :trailer, :imagen)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
    	$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":imdb", $datos["imdb"], PDO::PARAM_STR);
		$stmt->bindParam(":trailer", $datos["trailer"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();		
		$stmt = null;
	

	}



		/**********************
		 TRAER Content
		**********************/

		static public function mdlMostrarContents($tabla) {

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
		 BORRAR Content
		**********************/

		static public function mdlBorrarContent($tabla, $item, $valor){

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