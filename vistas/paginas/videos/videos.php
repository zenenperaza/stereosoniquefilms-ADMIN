<section>
    <div class="container">
    <div class="heading-text heading-section text-center">
                        <h4>Administrador de Videos</h4>
                    </div>
    </div>
</section>
<section id="page-content" style="background-color:#c4dadf;">

            <div class="container">
                <div class="row">
                    <div class="content col-lg-9">
                        <h3>Alta de Videos</h3>
                        <form method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                                <label for="video">Seleccione Video</label>
                                <input type="file" class="form-control-file" name="video" id="video" accept="video/*" required>
                            </div>
                 
                            
                             <button type="submit"  name="btnSubirVideo" class="btn m-t-30 mt-3">Subir</button>

                          
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
<section id="page-content" class="no-sidebar">
            <div class="container">
                <!-- DataTable -->
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <h4>Videos</h4>
                    </div>
               
                </div>
                <div class="row">

                    <div class="row">
                        <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Video</th>
                                    <th>
                                        Acciones 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php

                                        $videos = ControladorVideos::ctrMostrarVideos();
                                        // var_dump($videos);
                                        foreach ($videos as $video) {
                                    ?>
                                    <tr role="row" class="odd">

                                <td>
                                <?php echo $video["id"]?>
                                </td>

                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6 ">
                                            <video id="" class="video" controls poster="" >
                                                <source src="<?php echo $ruta?>vistas/videos/<?php echo $video["video"]?>" type="video/mp4">
                                                <source src="<?php echo $ruta?>vistas/videos/<?php echo $video["video"]?>" type="video/webm">   
                                                <source src="<?php echo $ruta?>vistas/videos/<?php echo $video["video"]?>" type='video/mpg; codecs="avc1.42E01E, mp4a.40.2"'>                          
                                                <source src="<?php echo $ruta?>vistas/videos/<?php echo $video["video"]?>" type='video/mpeg; codecs="avc1.42E01E, mp4a.40.2"'>
                                                <source src="<?php echo $ruta?>vistas/videos/<?php echo $video["video"]?>" type="video/ogg">
                                            </video>
                                        </div>  
                                    </div>
                                </td>
                                <td>
                                <button  type="button" class="btn btn-block btn-danger btn-sm eliminar-video btnEliminarVideo" rutaVideo="<?php echo $video["video"]?>" idVideo="<?php echo $video["id"]?>">Eliminar video</button>
                     
                                </td>
       
                                </tr>
                                    <?php

                                        }
                                    ?>

                                   
                            
                            </tbody>
                            <tfoot>
                                <tr>                              
                                    <th>ID</th>
                                    <th>Video</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
             
                </div>
                    </div>
                </div>
                <!-- end: DataTable -->
            </div>
        </section>
<script>
// /admin/vistas/paginas/inicio?idVideo=1&rutaVideo=vistas/videos/1693252274.mp4
</script>
        
    <?php 

$videos = new ControladorVideos();
$videos -> ctrSubirVideo();

$borrarVideo = new ControladorVideos();
$borrarVideo -> ctrBorrarVideo();

?>