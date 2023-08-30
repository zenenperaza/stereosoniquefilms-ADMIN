<div class="row">
    <div class="col-lg-4">
        <div class="form-group text-center m-3">
        <a href="../contents/nuevo" class="" >
            <button class="btn btn-primary" type="submit">Nuevo Content</button>
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
                                    <th>Descripción</th>
                                    <th>Cargo</th>
                                    <th>Link IMDB</th>
                                    <th>Link Trailer</th>
                                    <th>Imagen</th>
                                    <th>Fecha Ingreso</th>
                                    <th>
                                        Acciones 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php

                                    $contents = ControladorContents::ctrMostrarContents();
                                    // var_dump($Contents);
                                    // return;
                                    foreach ($contents as $content) {
                                ?>
                                <tr role="row" class="odd">

                                <td>
                                <?php echo $content["id"]?>
                                </td>
                                <th><?php echo $content["titulo"]?></th>
                                <th><?php echo $content["descripcion"]?></th>
                                <th><?php echo $content["cargo"]?></th>
                                <th><a href="<?php echo $content["imdb"]?>" target="_blank" class="btn btn-info">IMDB</a></th>
                                <th><a href="<?php echo $content["trailer"]?>" target="_blank" class="btn btn-danger">Trailer</a></th>
                                <th>
                                    <a href="<?php echo $ruta?>vistas/img/contents/<?php echo $content["imagen"]?>" target="_blank">
                                        <img src="<?php echo $ruta?>vistas/img/contents/<?php echo $content["imagen"]?>" class="img-fluid rounded-circle " style="width:100px">
                                    </a>
                                </th>
                                <th><?php echo $content["fecha"]?></th>
                                <td>
                                    <button  type="button" class="btn btn-danger  btnEliminarContent"  rutaImagen="<?php echo $content["imagen"]?>" idContent="<?php echo $content["id"]?>">Eliminar content</button>                     
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
                                    <th>Descripción</th>
                                    <th>Cargo</th>
                                    <th>Link IMDB</th>
                                    <th>Link Trailer</th>
                                    <th>Imagen</th>
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


    