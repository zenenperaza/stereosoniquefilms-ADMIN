<?php


class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["email"])){

			// var_dump($_POST);
			// return;

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){
                
        	// $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "email";
				$valor = $_POST["email"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if (is_array($respuesta)) {

					if($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $_POST["password"]){        

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["email"] = $respuesta["apellido"];

						
							echo '<script>

								window.location = "../inicio";

							</script>';

							return;

						}		else{

					echo '<div class="alert alert-danger error-ingreso">Error al ingresar. <br> Datos incorrectos, vuelve a intentarlo </div>';

				}

				} 
				else {
					echo '<div class="alert alert-danger error-ingreso">Error al ingresar. <br> Datos incorrectos, vuelve a intentarlo </div>';
				}

				
				}

			}	

		}

    
    	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["btnAgregarUsuario"])){
      
      if($_POST["password"] === $_POST["password2"]){
       
      

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){

			   /*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["foto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["email"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["foto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["email"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}
                    
                    
                    if($_FILES["foto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["email"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				} else {
          
						$ruta = "vistas/img/usuarios/default/anonymous.png";

        }

				$tabla = "usuarios";
                
                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                
                $nuevoNombre = $_POST["nombre"];
                $nuevoApellido = $_POST["apellido"];
                $nuevoNombre = strtoupper($nuevoNombre);
                $nuevoApellido = strtoupper($nuevoApellido);

				$datos = array("nombre" => $nuevoNombre,
                       "apellido" => $nuevoApellido,
					           "email" => $_POST["email"],
					           "password" => $encriptar,
					           "perfil" => $_POST["perfil"],
					           "foto"=>$ruta,
					           "estado"=>1);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

							echo '<script>         
                swal({
                    title: "Usuario agregado!",
                    text: "EL Usuarios fue guardado satisfactoriamente!",
                    type: "success",
                    icon: "success",
                }).then(function() {
                    window.location = "usuarios";
                });
                  
              </script>';



				}	else {
            echo '<script>

					swal({
						type: "error",
						title: "¡Error al ingresar en la DB!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});		
          
          		window.location = "usuarios";

					</script>';
          
        }


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		
    } else  {
      echo '<script>         
                swal({
                    title: "Password no coinciden!",
                    text: "Debe confirmar su password!",
                    type: "error",
                    icon: "error"
                }).then(function() {
                    window.location = "usuarios";
                });
                  
              </script>';
      }
    }


	}
    
    /*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["btnEditarUsuario"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarEmail"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])  && $_POST["fotoActual"] != "vistas/img/usuarios/default/anonymous.png"){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarEmail"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarEmail"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				} 

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){
          
      
      if($_POST["editarPassword"] === $_POST["editarPassword2"]){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				 }else{

					 echo '<script>         
                swal({
                    title: "Password no coinciden!",
                    text: "Debe confirmar su password!",
                    type: "error",
                    icon: "error"
                }).then(function() {
                    window.location = "usuarios";
                });
                  
              </script>';
        return;

				}
      
      }else{

					$encriptar = $_POST["passwordActual"];

				}
                
                $editarNombre = $_POST["editarNombre"];
                $editarNombre = strtoupper($editarNombre);
                $editarApellido = $_POST["editarApellido"];
                $editarApellido = strtoupper($editarApellido);

				$datos = array("nombre" => $editarNombre,
                "apellido" => $editarApellido,
							   "email" => $_POST["editarEmail"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);
 
				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

				 swal({
                    title: "¡Usuario editado!",
                    text: "EL Usuarios fue editado satisfactoriamente!",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = "usuarios";
                });   

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}
    /*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["foto"] != "" && $_GET["foto"] != "vistas/img/usuarios/default/anonymous.png"){

				unlink($_GET["foto"]);
				rmdir('vistas/img/usuarios/'.$_GET["email"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script>  
                
                swal({
                    title: "¡Usuario eliminado!",
                    text: "EL Usuarios fue borrado satisfactoriamente!",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = "usuarios";
                });               
                  
              </script>';
        

			}		
    

}
}
}
	


