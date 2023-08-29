

  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <section id="page-title">
            <div class="container">
                <div class="page-title">
                    <h1>Administrador de Works</h1>
                    
                </div>
                <div class="breadcrumb">
                    <ul>
                    <?php

if(isset($routesArray[5])){

if($routesArray[5] == "nuevo" ){
    
    echo '<li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>'; 
    echo '<li class="breadcrumb-item"><a href="../work">Works</a></li>';
    echo '<li class="breadcrumb-item active">'.$routesArray[5].'</li>';
    
    }

}else{

echo '<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>';
echo '<li class="breadcrumb-item active">Work</li>';
}

?> 
                    </ul>
                </div>
            </div>
        </section>



<?php 

if(isset($routesArray[5])){

   if($routesArray[5] == "nuevo" ){

      include "acciones/".$routesArray[5].".php";

    }

}else{

    include "acciones/listar.php";

}

?>

    
 


<script src="js/jquery.js"></script>
<script src="plugins/popper/popper.min.js"></script>



<script src="plugins/sweetalert2/sweetalert2.all.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

   
  });
</script>
    <?php 

$works = new ControladorWorks();
$works -> ctrNuevoWork();

$works = new ControladorWorks();
$works -> ctrBorrarWork();



?>