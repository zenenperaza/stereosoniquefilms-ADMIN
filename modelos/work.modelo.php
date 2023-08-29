<?php

require_once "conexion.php";

class ModeloWorks{

	/*=============================================
	MOSTRAR WORK
	=============================================*/

	static public function mdlIngresarWork($tabla, $datos){
    
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
		(titulo, artista, informacion, link, imagen, video) 
		VALUES (:titulo, :artista, :informacion, :link, :imagen, :video)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
    	$stmt->bindParam(":artista", $datos["artista"], PDO::PARAM_STR);
		$stmt->bindParam(":informacion", $datos["informacion"], PDO::PARAM_STR);
		$stmt->bindParam(":link", $datos["link"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();		
		$stmt = null;
	

	}



		/**********************
		 TRAER WORK
		**********************/

		static public function mdlMostrarWorks($tabla) {

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
		 BORRAR WORK
		**********************/

		static public function mdlBorrarWork($tabla, $item, $valor){

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