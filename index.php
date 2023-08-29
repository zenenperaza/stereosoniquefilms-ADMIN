<?php
/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "php_error_log");

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";


require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/videos.controlador.php";
require_once "modelos/videos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();