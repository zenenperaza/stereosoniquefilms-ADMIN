<div class="row">
    <div class="col-lg-4">
        <div class="form-group text-center m-3">
        <a href="../work/nuevo" class="" >
            <button class="btn btn-primary" type="submit">Nuevo Work</button>
        </a>
        </div>
    </div>
</div>
<section id="page-content" class="no-sidebar mb-5">
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
                                    <th>Título</th>
                                    <th>Artista</th>
                                    <th>Informacion</th>
                                    <th>Link</th>
                                    <th>Imagen</th>
                                    <th>Video</th>
                                    <th>Fecha Ingreso</th>
                                    <th>
                                        Acciones 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php

                                    $works = ControladorWorks::ctrMostrarWorks();
                                    // var_dump($works);
                                    // return;
                                    foreach ($works as $work) {
                                ?>
                                <tr role="row" class="odd">

                                <td>
                                <?php echo $work["id"]?>
                                </td>
                                <th><?php echo $work["titulo"]?></th>
                                <th><?php echo $work["artista"]?></th>
                                <th><?php echo $work["informacion"]?></th>
                                <th><a href="<?php echo $work["link"]?>" target="_blank"><?php echo $work["link"]?></a></th>
                                <th>
                                    <a href="<?php echo $ruta?>vistas/img/works/<?php echo $work["imagen"]?>" target="_blank">
                                        <img src="<?php echo $ruta?>vistas/img/works/<?php echo $work["imagen"]?>" class="img-fluid rounded-circle " style="width:100px">
                                    </a>
                                </th>
                                <td>

                                    <div class="row justify-content-center">
                                        <a href="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" target="_blank">
                                            <div class="col-sm-6 ">
                                            
                                                    <video id="" class="video" controls poster="" >
                                                        <source src="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" type="video/mp4">
                                                        <source src="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" type="video/webm">   
                                                        <source src="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" type='video/mpg; codecs="avc1.42E01E, mp4a.40.2"'>                          
                                                        <source src="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" type='video/mpeg; codecs="avc1.42E01E, mp4a.40.2"'>
                                                        <source src="<?php echo $ruta?>vistas/videos/works/<?php echo $work["video"]?>" type="video/ogg">
                                                    </video>
                                            
                                            </div> 
                                        </a> 
                                    </div>
                                </td>
                                <th><?php echo $work["fecha"]?></th>
                                <td>
                                    <button  type="button" class="btn btn-block btn-danger btn-sm  btnEliminarWork" rutaVideo="<?php echo $work["video"]?>" rutaImagen="<?php echo $work["imagen"]?>" id="<?php echo $work["id"]?>">Eliminar work</button>                     
                                </td>
       
                                </tr>
                                    <?php

                                        }
                                    ?>

                                   
                            
                            </tbody>
                            <tfoot>
                                <tr> 
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Artista</th>
                                    <th>Informacion</th>
                                    <th>Link</th>
                                    <th>Imagen</th>
                                    <th>Video</th>
                                    <th>Fecha Ingreso</th>
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


    