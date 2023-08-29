
            <div class="row">
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Casos</h4>
                  </div>
                  <div class="card-body">
                  
                    <div class="box-header with-border">

                    <a href="casos/nuevo" class="btn btn-primary" >

                    Nuevo caso

                    </a>

                    </div>
                    
                  </div>
                  
                </div>
                
                <div class="card">
                  <div class="card-header">
                    <h4>Busquedas</h4>
                  </div>
                  <div class="card-body"> 
                    
                    <div class="form-group col-md-6">
                      <label>Tipo de caso</label>
                      <select class="form-control selectric" id="selectBox" onchange="cambiarch()" >
                        <option >Seleccione tipo de caso</option>
                        <option value="casos?tipoCasos=Denuncia">Denuncia</option>
                        <option value="casos?tipoCasos=Permiso viaje">Permiso de viaje</option>
                        <option value="casos?tipoCasos=Credencial trabajo">Solicitud de credencial de trabajo</option>
                        <option value="casos?tipoCasos=Remision">Remisiones a otros Org.</option>
                        <option value="casos?tipoCasos=Orientacion">Orientaciones</option>
                      </select>
                    </div>

                    
                  </div>
                  
                </div>
            
              </div>
            </div>
<!--             && $_GET["tipoCasos"]=="Denuncia" -->
            <div class="row">
              <div class="col-12">
                
                <?php 
                 if(isset($_GET["tipoCasos"])){
                   
                     if($_GET["tipoCasos"] == "Denuncia"){
                       
                ?>
               
                <div class="card">
                  
                  <div class="card-body"> 
                  
                  </div>
                  <div class="card-header">
                    <h4>Total Denuncias</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php


                                  $item = "tipo";
                                  $valor = $_GET["tipoCasos"];


                                  $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                                  foreach ($casos as $key => $value) {
                                    
                               ?>
         
                          <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                          </tr>
                          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php 
                       
                     } elseif($_GET["tipoCasos"] == "Permiso viaje"){
                       
                 ?>
               
                <div class="card">
                  
                  <div class="card-body"> 
                  
                  </div>
                  <div class="card-header">
                    <h4>Total Permiso de viajes</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php


                                  $item = "tipo";
                                  $valor = $_GET["tipoCasos"];


                                  $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                                  foreach ($casos as $key => $value) {
                                    
                               ?>
         
                          <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                          </tr>
                          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php 
                       
                     } elseif($_GET["tipoCasos"] == "Credencial trabajo"){
                        ?>
                
               
                <div class="card">
                  
                  <div class="card-body"> 
                  
                  </div>
                  <div class="card-header">
                    <h4>Total Credenciales de trabajo</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php


                                  $item = "tipo";
                                  $valor = $_GET["tipoCasos"];


                                  $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                                  foreach ($casos as $key => $value) {
                                    
                               ?>
         
                          <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                          </tr>
                          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php 
                       
                     } elseif($_GET["tipoCasos"] == "Remision"){
                        ?>
                
                <div class="card">
                  
                  <div class="card-body"> 
                  
                  </div>
                  <div class="card-header">
                    <h4>Total Remisiones a otros Organismos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php


                                  $item = "tipo";
                                  $valor = $_GET["tipoCasos"];


                                  $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                                  foreach ($casos as $key => $value) {
                                    
                               ?>
         
                          <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                          </tr>
                          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php 
                       
                     } elseif($_GET["tipoCasos"] == "Orientacion"){
                        ?>
                
               
                <div class="card">
                  
                  <div class="card-body"> 
                  
                  </div>
                  <div class="card-header">
                    <h4>Total de Orientaciones</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php


                                  $item = "tipo";
                                  $valor = $_GET["tipoCasos"];


                                  $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

                                  foreach ($casos as $key => $value) {
                                    
                               ?>
         
                          <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                          </tr>
                          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php 
                       
                     }
                       
                 } else {
                   
                ?>
                
                <div class="card">
                  
                  <div class="card-body"> 
                  
                      <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                        <span>
                          <i class="fa fa-calendar"></i> 
                          <?php

                          if(isset($_GET["fechaInicial"])){

                          echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];

                          }else{

                          echo 'Rango de fecha';

                          }

                          ?>
                        </span>
                      <i class="fa fa-caret-down"></i>
                      </button>
                  </div>
                  <div class="card-header">
                    <h4>Total General de Casos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
                        <thead>
                          <tr>
                           <th style="width:10px">#</th>
                           <th>Tipo</th>
                           <th>Cédula Solicitante</th>
                           <th>Nombre</th>
                           <th>Sexo</th>
                           <th>Observaciones</th>
                           <th>Direccion</th>
                           <th>Cédula particular</th>
                           <th>Nombre particular</th>
                           <th>Cédula NNA</th>
                           <th>Nombre NNA</th>
                           <th>Derecho vul</th>
                           <th>Medidas de pro.</th>
                           <th>Notificacion MP</th>
                           <th>Fecha</th>
                           <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
               
                              <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $casos = ControladorCasos::ctrMostrarCasosRangoFecha($fechaInicial, $fechaFinal);

          foreach ($casos as $key => $value) {
         ?>
         
         <tr>
                           <th style="width:10px"><?php echo $key+1;?></th>
                           <th><?php echo $value['tipo'];?></th>
                           <th><?php echo $value['cedula_solicitante'];?></th>
                           <th><?php echo $value['nombre_solicitante']." ".$value['apellido_solicitante'];?></th>
                           <th><?php echo $value['sexo_solicitante'];?></th>
                           <th><?php echo $value['observaciones'];?></th>
                           <th><?php echo $value['direccion_solicitante'];?></th>
                           <th><?php echo $value['cedula_denunciado'];?></th>
                           <th><?php echo $value['nombre_denunciado']." ".$value['apellido_denunciado'];?></th>
                           <th><?php echo $value['cedula_nna'];?></th>
                           <th><?php echo $value['nombre_nna']." ".$value['apellido_nna'];?></th>
                           <th><?php echo $value['derecho_vulnerado'];?></th>
                           <th><?php echo $value['medidas'];?></th>
                           <th><?php echo $value['ministerio'];?></th>
                           <th><?php echo $value['fecha_creacion_caso'];?></th>
                           <th>
                             <a  class="btn btn-info btnVerCaso" idCaso="<?php echo $value['id_caso'] ?>" href="casos/ver/<?php echo $value['id_caso'] ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a >
                     
                            </th>
                          </tr>
          <?php } ?>
        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <?php
                }
                ?>
                
              </div>
            </div>
            