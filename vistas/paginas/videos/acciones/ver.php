 <?php

            if(isset($routesArray[4])){
              
               $item = "id_caso";
               $valor = $routesArray[4];

        $casos = ControladorCasos::ctrMostrarCaso($item, $valor);

            }
?>
    <section class="section">
      
     
                
                <?php 
                 if($casos["tipo"]=="Denuncia"):
                ?>              

<!--                   FORM PERMISO DE DENUNCIAS -->               
                <div class="card" id="general">
                 <div class="card-body">
                    <div class="">                 
                      <p class="clearfix">
                        <span class="float-left">
                          <?php   echo ( $casos["tipo"] ); ?>
                        </span>
                        <span class="float-right text-muted">
                          <span>Fecha: </span>
                          <?php   echo ( $casos["fecha_creacion_caso"] ); ?>
                        </span>
                      </p>
                  </div>
                   <div class="card-header">
                    <h6>Datos del Solicitante</h6>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="cedulaSolicitante">Cédula</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">
                         <?php   echo ( $casos["cedula_solicitante"] ); ?>
                      </label>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>                    
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>  
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
     
                         <?php   echo ( $casos["fecha_nacimiento_solicitante"] ); ?>
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>                     
                         <?php   echo ( $casos["edad_solicitante"] ); ?>
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                      
                         <?php   echo ( $casos["sexo_solicitante"] ); ?>
                    </div>
       

                      </div>    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                  
                         <?php   echo ( $casos["nacionalidad_solicitante"] ); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                       
                         <?php   echo ( $casos["estado_solicitante"] ); ?>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                       
                         <?php   echo ( $casos["municipio_solicitante"] ); ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                     
                         <?php   echo ( $casos["direccion_solicitante"] ); ?>
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                   
                         <?php   echo ( $casos["observaciones"] ); ?>
                  </div>
                                 
              
                    <div class="card-header">
                    <h6>Datos del NNA</h6>
                   </div>
                    
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaNNA">Cédula</label>
                   
                         <?php   echo ( $casos["cedula_nna"] ); ?>
                      </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreNNA">Nombre</label>
                   
                         <?php   echo ( $casos["nombre_nna"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoNNA">Apellido</label>
                         <?php   echo ( $casos["apellido_nna"] ); ?>
                      </div>
                    </div>
                                                          
                    <div class="form-group">
                      <label for="fechaNacimientoNNA">Fecha de nacimiento</label>      
                         <?php   echo ( $casos["fecha_nacimiento_nna"] ); ?>
                    </div>
                    <div class="form-group">
                      <label for="edadNNA">Edad</label> 
                         <?php   echo ( $casos["edad_nna"] ); ?>
                    </div>  
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label> 
                         <?php   echo ( $casos["sexo_nna"] ); ?>
                    </div>
         

                      </div> 
                    
                    <div class="form-row">
                    <div class="form-group  col-md-2">
                      <label  for="nacionalidadNNA">Nacionalidad</label> 
                         <?php   echo ( $casos["nacionalidad_nna"] ); ?>
                    </div>  
                   </div>
                      
                    <div class="form-group">
                      <label for="direccionNNA">Dirección</label> 
                         <?php   echo ( $casos["direccion_nna"] ); ?>
                    </div>
                   
                   <div class="card-header">
                    <h6>Datos del particular o interesado (a) </h6>
                   </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaDenunciado">Cédula</label>
                         <?php   echo ( $casos["cedula_denunciado"] ); ?>
                      </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreDenunciado">Nombre</label>
                         <?php   echo ( $casos["nombre_denunciado"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoDenunciado">Apellido</label>
                         <?php   echo ( $casos["apellido_denunciado"] ); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fechaNacimientoDenunciado">Fecha de nacimiento</label>      
                         <?php   echo ( $casos["fecha_nacimiento_denunciado"] ); ?>
                    </div>
                    <div class="form-group">
                      <label for="edadDenunciado">Edad</label>
                         <?php   echo ( $casos["edad_denunciado"] ); ?>
                    </div> 
                    <div class="form-row">
                    <div class="form-group ">
                      <label for="inputAddress">Sexo: </label>
                         <?php   echo ( $casos["_denunciado"] ); ?>
                    </div>
                    </div> 
                    
                    
                    <div class="form-row">
                    <div class="form-group ">
                      <label  for="nacionalidadDenunciado">Nacionalidad</label>
                         <?php   echo ( $casos["nacionalidad_denunciado"] ); ?>
                    </div>  
                   </div>
                   
                    <div class="form-row">
                    <div class="form-group">
                      <label for="direccionDenunciado">Dirección</label>
                         <?php   echo ( $casos["direccion_denunciado"] ); ?>
                    </div> 
                   </div>
                           
                  <div class="card-header">
                    <h6>Datos de seguimiento </h6>
                  </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-8">  
                        <p> Medidas de proteccion: 
                         <?php   echo ( $casos["medidas"] ); ?></p>
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <div class="col-sm-8">  
                        <p> Se informó al MP: 
                         <?php   echo ( $casos["ministerio"] ); ?></p>
                      </div>
                    </div>
                   
                  </div>
                       <div class="card-footer">
                    
<!--             <button class="btn btn-outline-success" id="btnpdf"><i class="fa fa-send mg-r-10"></i> PDF</button> -->
                  </div>
                  
                </div>
               <?php 
                 elseif($casos["tipo"]=="Permiso viaje"):
                ?>   
               
<!--                   FORM PERMISO DE VIAJES -->
       <div class="card" id="general">
                 <div class="card-body">
                    <div class="">                 
                      <p class="clearfix">
                        <span class="float-left">
                          <?php   echo ( $casos["tipo"] ); ?>
                        </span>
                        <span class="float-right text-muted">
                          <span>Fecha: </span>
                          <?php   echo ( $casos["fecha_creacion_caso"] ); ?>
                        </span>
                      </p>
                  </div>
                   <div class="card-header">
                    <h6>Datos del Solicitante</h6>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="cedulaSolicitante">Cédula</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">
                         <?php   echo ( $casos["cedula_solicitante"] ); ?>
                      </label>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>                    
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>  
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
     
                         <?php   echo ( $casos["fecha_nacimiento_solicitante"] ); ?>
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>                     
                         <?php   echo ( $casos["edad_solicitante"] ); ?>
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                      
                         <?php   echo ( $casos["sexo_solicitante"] ); ?>
                    </div>
       

                      </div>    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                  
                         <?php   echo ( $casos["nacionalidad_solicitante"] ); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                       
                         <?php   echo ( $casos["estado_solicitante"] ); ?>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                       
                         <?php   echo ( $casos["municipio_solicitante"] ); ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                     
                         <?php   echo ( $casos["direccion_solicitante"] ); ?>
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                   
                         <?php   echo ( $casos["observaciones"] ); ?>
                  </div>
                          
                                         
                  <div class="card-header">
                    <h5>Datos del 2do Representante legal</h5>
                  </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaSegundoRepresentante">Cédula</label>
                   
                         <?php   echo ( $casos["_segundo_representante"] ); ?> </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSegundoRepresentante">Nombre</label>
                         <?php   echo ( $casos["nombre_segundo_representante"] ); ?> 
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSegundoRepresentante">Apellido</label>
                         <?php   echo ( $casos["apellido_segundo_representante"] ); ?> 
                      </div>
                    </div>
                                   
                    <div class="form-row">
                      <div class="form-group col-md-6">
                      <label for="fechaNacimientoSegundoRepresentante">Fecha de nacimiento</label>               
       
                         <?php   echo ( $casos["fecha_nacimiento_segundo_representante"] ); ?> 
                      </div>
                    </div> 
                   
                    <div class="form-group">
                      <label for="edadSegundoRepresentante">Edad</label>
                         <?php   echo ( $casos["edad_segundo_representante"] ); ?> 
                    </div> 
                   
                      <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                         <?php   echo ( $casos["sexo_segundo_representante"] ); ?> 

                      </div> 
                   
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                         <?php   echo ( $casos["nacionalidad_segundo_representante"] ); ?> 
                    </div>
                     </div> 
                      
                   
                    <div class="form-group">
                      <label for="direccionSegundoRepresentante">Dirección</label>
                         <?php   echo ( $casos["direccion_segundo_representante"] ); ?> 
                    </div>  
                    
                  <div class="card-header">
                    <h5>Datos del NNA</h5>
                  </div>
                    
                  
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaNNAViaje">Cédula</label>
                         <?php   echo ( $casos["_nna_viaje"] ); ?>   </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreNNAViaje">Nombre</label>
                         <?php   echo ( $casos["nombre_nna_viaje"] ); ?>  
                      </div>
                      </div>
                   
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="apellidoNNAViaje">Apellido</label>
                         <?php   echo ( $casos["apellido_nna_viaje"] ); ?>  
                      </div>
                      </div>
                     
                    <div class="form-row">
                     <div class="form-group">
                      <label for="fechaNacimientoNNAViaje">Fecha de nacimiento</label>    
                         <?php   echo ( $casos["fecha_nacimiento_nna_viaje"] ); ?>  
                   </div>
                   </div>
                   
                    <div class="form-row">
                    <div class="form-group">
                      <label for="edadNNAViaje">Edad</label>
                         <?php   echo ( $casos["edad_nna_viaje"] ); ?>  
                      </div>
                   </div>
                 
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                         <?php   echo ( $casos["sexo_nna_viaje"] ); ?> 
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                         <?php   echo ( $casos["nacionalidad_nna_viaje"] ); ?>   
                    </div>
                   </div>
                        
                     <div class="form-row">
                    <div class="form-group">
                      <label for="direccionNNAViaje">Dirección</label>
                         <?php   echo ( $casos["direccion_nna_viaje"] ); ?>  
                    </div>
                   </div>
                 
                    
                    <div class="card-header">
                    <h5>Datos de Viaje </h5>
                  </div>
                                      
                  <div class="form-row">
                    <div class="form-group mr-2">
                      <label for="inputAddress">Tipo de viaje: </label>
                    </div>
                         <?php   echo ( $casos["tipo_viaje"] ); ?>          
                   </div>              
                      
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="destinoViaje">Destino</label>
                      <?php   echo ( $casos["destino_viaje"] ); ?>  
                      </div>
                    </div> 
                   
                   <div class="card-header">
                    <h5>Información de identidad </h5>
                  </div>
                   
                    <div class="form-group row">
                      <div class="col-sm-8">  
                        <p> ¿Posee Pasaporte: SI o NO?</p>
                    
                      <?php   echo ( $casos["pasaporte"] ); ?> 
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <div class="col-sm-8">  
                        <p> ¿Posee Visa: SI o NO?</p>
                     
                      <?php   echo ( $casos["visa"] ); ?> 
                      </div>
                    </div>
                     
                  </div>
        
                </div>
      
              <?php 
                 elseif($casos["tipo"]=="Credencial trabajo"):
                ?>  
      
              
                  
<!--                   FORM PERMISO DE CREDENCIALES -->
          <div class="card" id="general">
                 <div class="card-body">
                    <div class="">                 
                      <p class="clearfix">
                        <span class="float-left">
                          <?php   echo ( $casos["tipo"] ); ?>
                        </span>
                        <span class="float-right text-muted">
                          <span>Fecha: </span>
                          <?php   echo ( $casos["fecha_creacion_caso"] ); ?>
                        </span>
                      </p>
                  </div>
                   <div class="card-header">
                    <h6>Datos del Solicitante</h6>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="cedulaSolicitante">Cédula</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">
                         <?php   echo ( $casos["cedula_solicitante"] ); ?>
                      </label>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>                    
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>  
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
     
                         <?php   echo ( $casos["fecha_nacimiento_solicitante"] ); ?>
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>                     
                         <?php   echo ( $casos["edad_solicitante"] ); ?>
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                      
                         <?php   echo ( $casos["sexo_solicitante"] ); ?>
                    </div>
       

                      </div>    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                  
                         <?php   echo ( $casos["nacionalidad_solicitante"] ); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                       
                         <?php   echo ( $casos["estado_solicitante"] ); ?>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                       
                         <?php   echo ( $casos["municipio_solicitante"] ); ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                     
                         <?php   echo ( $casos["direccion_solicitante"] ); ?>
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                   
                         <?php   echo ( $casos["observaciones"] ); ?>
                  </div>
                   
                  <div class="card-header">
                    <h5>Datos del adolescente trabajador(a)</h5>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaTrabajo">Cédula del adolescente</label>
                          <?php   echo ( $casos["_trabajo"] ); ?> 
                      </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreTrabajo">Nombre</label>
                          <?php   echo ( $casos["nombre_trabajo"] ); ?> 
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoTrabajo">Apellido</label>
                          <?php   echo ( $casos["apellido_trabajo"] ); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fechaNacimientoTrabajo">Fecha de nacimiento</label>
              
                          <?php   echo ( $casos["fecha_nacimiento_trabajo"] ); ?> 
                    </div> 
                    
                    <div class="form-group">
                      <label for="edadTrabajo">Edad</label>
                          <?php   echo ( $casos["edad_trabajo"] ); ?> 
                    </div> 
                    
                    
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                          <?php   echo ( $casos["sexo_trabajo"] ); ?> 

                      </div>
                    
                    <div class="form-group">
                      <label for="direccionTrabajo">Dirección</label>
                          <?php   echo ( $casos["direccion_trabajo"] ); ?> 
                    </div>   
                      
                      <label for="constanciaMedica" class="col-sm-12 col-form-label control-label">Datos de estudios</label>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nombreEscuela">Escuela</label>
                          <?php   echo ( $casos["escuela_estudio"] ); ?> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="gradoEstudio">Grado</label>
                          <?php   echo ( $casos["grado_estudio"] ); ?> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horarioEstudio">Horario clases</label>
                          <?php   echo ( $casos["horario_estudio"] ); ?> 
                      </div>
                    </div>                      
                      <label for="constanciaMedica" class="col-sm-12 col-form-label control-label">Datos de trabajo</label>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="lugarTrabajo">Lugar de trabajo</label>
                          <?php   echo ( $casos["lugar_trabajo"] ); ?> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="tipoTrabajo">Tipo de trabajo</label>
                          <?php   echo ( $casos["tipo_trabajo"] ); ?> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horarioTrabajo">Horario trabajo</label>
                          <?php   echo ( $casos["horario_trabajo"] ); ?> 
                      </div>
                    </div>                    
                    
                    <div class="form-group">
                      <label for="fechaIngreso">Fecha de ingreso</label>            
                          <?php   echo ( $casos["fecha_ingreso_trabajo"] ); ?> 
                    </div> 
                                
                    
                    <div class="form-group">
                      <label for="indicacionPatrono">Indicación patrono</label>                 
                          <?php   echo ( $casos["indicacion_patrono"] ); ?> 
                    </div> 
                    
                    <div class="form-group row">
                      <label for="constanciaMedica" class="col-sm-2 col-form-label control-label">Constancia médica</label>
                      <div class="col-sm-8">  
                        <p> ¿Posee Constancia médica: SI o NO?</p>              
                          <?php   echo ( $casos["constancia_medica"] ); ?> 
                      </div>
                    </div> 
                                 
                  </div>
                  <div class="card-footer">
                  </div>
                </div>  
              </div>
                <?php 
                 elseif($casos["tipo"]=="Remision"):
                ?> 
    
                  
<!--                   FORM PERMISO DE REMISIONES -->
          <div class="card" id="general">
                 <div class="card-body">
                    <div class="">                 
                      <p class="clearfix">
                        <span class="float-left">
                          <?php   echo ( $casos["tipo"] ); ?>
                        </span>
                        <span class="float-right text-muted">
                          <span>Fecha: </span>
                          <?php   echo ( $casos["fecha_creacion_caso"] ); ?>
                        </span>
                      </p>
                  </div>
                   <div class="card-header">
                    <h6>Datos del Solicitante</h6>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="cedulaSolicitante">Cédula</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">
                         <?php   echo ( $casos["cedula_solicitante"] ); ?>
                      </label>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>                    
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>  
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
     
                         <?php   echo ( $casos["fecha_nacimiento_solicitante"] ); ?>
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>                     
                         <?php   echo ( $casos["edad_solicitante"] ); ?>
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                      
                         <?php   echo ( $casos["sexo_solicitante"] ); ?>
                    </div>
       

                      </div>    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                  
                         <?php   echo ( $casos["nacionalidad_solicitante"] ); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                       
                         <?php   echo ( $casos["estado_solicitante"] ); ?>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                       
                         <?php   echo ( $casos["municipio_solicitante"] ); ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                     
                         <?php   echo ( $casos["direccion_solicitante"] ); ?>
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                   
                         <?php   echo ( $casos["observaciones"] ); ?>
                  </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreOrganismo">Nombre del organismo</label>
                         <?php   echo ( $casos["nombre_organismo"] ); ?>
                      </div>
                    </div> 
                        </div>
            </div>

                
                <?php 
                 elseif($casos["tipo"]=="Orientacion"):
                ?>  

<!--                   FORM PERMISO DE ORIENTACIONES -->
            <div class="card" id="general">
                 <div class="card-body">
                    <div class="">                 
                      <p class="clearfix">
                        <span class="float-left">
                          <?php   echo ( $casos["tipo"] ); ?>
                        </span>
                        <span class="float-right text-muted">
                          <span>Fecha: </span>
                          <?php   echo ( $casos["fecha_creacion_caso"] ); ?>
                        </span>
                      </p>
                  </div>
                   <div class="card-header">
                    <h6>Datos del Solicitante</h6>
                   </div>
                    <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="cedulaSolicitante">Cédula</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">
                         <?php   echo ( $casos["cedula_solicitante"] ); ?>
                      </label>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>                    
                         <?php   echo ( $casos["nombre_solicitante"] ); ?>  
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
     
                         <?php   echo ( $casos["fecha_nacimiento_solicitante"] ); ?>
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>                     
                         <?php   echo ( $casos["edad_solicitante"] ); ?>
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                      
                         <?php   echo ( $casos["sexo_solicitante"] ); ?>
                    </div>
       

                      </div>    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                  
                         <?php   echo ( $casos["nacionalidad_solicitante"] ); ?>
                      </div>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                       
                         <?php   echo ( $casos["estado_solicitante"] ); ?>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                       
                         <?php   echo ( $casos["municipio_solicitante"] ); ?>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                     
                         <?php   echo ( $casos["direccion_solicitante"] ); ?>
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                   
                         <?php   echo ( $casos["observaciones"] ); ?>
                  </div>
                      
                  
                  <div class="form-group">
                    <label for="tipoOrientacion">Tipo de orientacion</label>
                         <?php   echo ( $casos["tipo_orientacion"] ); ?>
                  </div>
              </div>
</div>

                  
                     <?php 
                 endif
                ?>
                 
                     
       
                  
    </section> 
          