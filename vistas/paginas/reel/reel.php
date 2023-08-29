
<section>
    <div class="container">
    <div class="heading-text heading-section text-center">
                        <h4>Administrador de Reels</h4>
                    </div>
    </div>
</section>
<section id="page-content" style="background-color:#c4dadf;">

            <div class="container">
                <div class="row">
                    <div class="content col-lg-9">
                        <h3>Alta de Reel</h3>
                        <form method="post" >
                    
                        <div class="form-group row">
                            <label for="link" class="col-3 col-form-label">Links Vimeo</label>
                            <div class="col-9">
                                <input class="form-control" type="text" placeholder="Escriba el link" name="link" id="link" required>
                            </div>
                        </div>
                            
                             <button type="submit"  name="btnSubirReel" class="btn m-t-30 mt-3">Guardar</button>

                          
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
                        <h4>Links</h4>
                    </div>
               
                </div>
                <div class="row">

                    <div class="row">
                        <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Link</th>
                                    <th>
                                        Acciones 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php

                                        $reels = ControladorReels::ctrMostrarReels();
                                        // var_dump($videos);
                                        foreach ($reels as $reel) {
                                    ?>
                                    <tr role="row" class="odd">

                                <td>
                                <?php echo $reel["id"]?>
                                </td>

                                <td>
                                 <a href="<?php echo $reel["link"]?>" target="_blank"><?php echo $reel["link"]?></a>
                                </td>
                                <td>
                                <button  type="button" class="btn btn-block btn-danger btn-sm  btnEliminarReel"  idReel="<?php echo $reel["id"]?>">Eliminar reel</button>
                     
                                </td>
       
                                </tr>
                                    <?php

                                        }
                                    ?>

                                   
                            
                            </tbody>
                            <tfoot>
                                <tr>                              
                                    <th>ID</th>
                                    <th>Link</th>
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
        
        <script src="plugins/sweetalert2/sweetalert2.all.js"></script>
        
    <?php 

$reel = new ControladorReels();
$reel -> ctrAgregarReel();

$borrarReel = new ControladorReels();
$borrarReel -> ctrBorrarReel();

?>