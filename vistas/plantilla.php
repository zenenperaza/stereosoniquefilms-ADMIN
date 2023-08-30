<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

/*=============================================
Capturar las rutas de la URL
=============================================*/

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);
/*=============================================
Limpiar la Url de variables GET
=============================================*/
foreach ($routesArray as $key => $value) {

  $value = explode("?", $value)[0];
  $routesArray[$key] = $value;
  
  
}

$ruta = ControladorRuta::ctrRuta();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<base href="<?php echo $ruta?>vistas/">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Admin</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto%3A700%2C400%2C300%2C500" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do%3A400" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="plugins/slider-revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="plugins/slider-revolution/fonts/font-awesome/css/font-awesome.css">
    <!-- Stylesheets & Fonts -->


    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    



</head>
<?php
  if(!isset($_SESSION["iniciarSesion"])){

    echo '<body >';
  } else {
?>
<body class="side-panel side-panel-static">
<?php
  }
?>
    <!-- Body Inner -->
    <div class="body-inner">
  
  <?php
  
  if(!isset($_SESSION["iniciarSesion"])){



   include "paginas/ingreso/ingreso.php"; 
    

   echo '<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/functions.js"></script>

</body>

</html>'; 

   return;

  }


  
   if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

    include "paginas/modulos/menu.php"; 
    // include "paginas/modulos/header.php";
  


 if(!empty($routesArray[4])){
        
        if( $routesArray[4] == "inicio" ||
           $routesArray[4] == "videos" ||
           $routesArray[4] == "work" ||
           $routesArray[4] == "reel" ||
           $routesArray[4] == "contents" ||
            $routesArray[4] == "salir"){  
          
          include "paginas/".$routesArray[4]."/".$routesArray[4].".php";       
          

        }else {          
            
            include "paginas/404/404.php";
          }

        } else {

         include "paginas/inicio/inicio.php";
                    
        }
      //  include "paginas/modulos/footer.php";
     
      }
  
  ?>

</div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
        <!--Plugins-->
    <script src="js/jquery.js"></script>

    

    
    <script src="js/plugins.js"></script>
    <script src="js/functions.js"></script>

    <script src="plugins/summernote/summernote-bs4.min.js"></script>

    <script src="plugins/sweetalert/sweetalert2.all.js"></script>

    <script src="plugins/sweetalert2/sweetalert2.all.js"></script>

    <script src="js/custom.js"></script>
</body>

</html>