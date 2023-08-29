 <?php

            if(isset($routesArray[4])){
              
               $item = "id_caso";
               $valor = $routesArray[4];

        $casos = ControladorCasos::ctrMostrarCasos($item, $valor);

            }
?>
<section class="section">
      <div class=" ">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Editar administrador</h4>
              </div>
              <div class="card-body">
                <form method="POST"  name="" enctype="multipart/form-data"  autocomplete="off">

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="editarNombre">Nombre</label>
                      <input id="editarNombre" type="text" class="form-control" name="editarNombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}" value="<?php echo $administradores['nombre']?>" autofocus >
                    </div>
                    <div class="form-group col-6">
                      <label for="editarApellido">Apellido</label>
                      <input id="editarApellido" type="text" class="form-control" name="editarApellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}"  value="<?php echo $administradores['apellido']?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="editarEmail">Email</label>
                    <input id="editarEmail" type="email" class="form-control" name="editarEmail"  value="<?php echo $administradores['email']?>"  readonly required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="editarPassword" class="d-block">Password</label>
                      <input id="editarPassword" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="editarPassword"  min="8" max="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"
                             title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos entre 8 o 10 caracteres"  onchange="validateJS(event, 'pass')" autocomplete="new-password" >
                                     <div class="valid-feedback">OK</div>
                    <div class="invalid-feedback">
                    </div>
                      <div id="pwindicator" class="pwindicator">
               
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="editarPassword2" class="d-block">Password confirmar</label>
                      <input id="editarPassword2" type="password" class="form-control" name="editarPassword2"  min="8" max="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"
  title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos entre 8 o 10 caracteres" onchange="validateEditarPassword()" >
                             <div class="valid-feedback">OK</div>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                        <input type="hidden" id="passwordActual" name="passwordActual"  value="<?php echo $administradores['password']?>" >                   
                  </div>
                 <div class="section-title">Perfil</div>
                    <div class="form-group">
                      <select class="form-control form-control-sm" name="editarPerfil">        
                        <option value="" id="editarPerfil"></option>

                        <option value="Administrador"  <?php if($administradores['perfil']=="Administrador") echo "selected"?>>Administrador</option>

                        <option value="Usuario" <?php if($administradores['perfil']=="Usuario") echo "selected"?>>Usuario</option>

                        <option value="Especial" <?php if($administradores['perfil']=="Especial") echo "selected"?>>Especial</option>

                      </select>
                    </div>
                                                <!-- ENTRADA PARA SUBIR FOTO -->
                                 <!-- ENTRADA PARA SUBIR FOTO -->
                  	<div class="form-group mt-2">
					
                        <label >Foto</label>

                        <label for="customFile" class="d-flex justify-content-center">

                          <figure class="text-center py-3">
                             <?php   if($administradores["foto"] != ""): ?>

                            <img src="<?php echo $administradores["foto"]?>" class="img-fluid rounded-circle changePicture" style="width:100px">
                            
                            <?php   else: ?>               

                            <img src="vistas/img/administradores/default/default.png" class="img-fluid rounded-circle changePicture" style="width:100px">

                            <?php   endif ?>

                          </figure>

                        </label>

                        <div class="custom-file">

                          <input 
                          type="file" 
                          id="customFile" 
                          class="custom-file-input"
                          accept="image/*"
                          onchange="validateImageJS(event,'changePicture')"
                          name="editarFoto"
                          >

                          <div class="valid-feedback">Ok</div>
                                <div class="invalid-feedback"></div>

                          <label for="customFile" class="custom-file-label">Seleccione foto</label>

					                </div>
                        <input type="hidden" name="fotoActual" id="fotoActual"  value="<?php echo $administradores['foto']?>" >

                  </div>
                  
<!--              <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="foto" name="editarFoto"	accept="image/*">

              <p class="help-block">Peso máximo de la foto 2 MB</p>
               
               <?php   if($administradores["foto"] != ""): ?>
               
              <img src="<?php echo $administradores["foto"]?>" class="img-thumbnail previsualizar" width="100px">
               
               <?php   else: ?>               
               
              <img src="vistas/img/administradores/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
               
               <?php   endif ?>
               
              <input type="hidden" name="fotoActual" id="fotoActual"  value="<?php echo $administradores['foto']?>" >

            </div> -->
                  
        <div class="modal-footer">
          
            <div class="buttons float-right">              
              
              <a href="admin" class="btn btn-default pull-left" >Salir</a>

              <button type="submit" name="btnEditarAdministrador" class="btn btn-primary">Guardar cambios</button>

            </div>
  
        </div>
                </form>
              </div>
            </div>
      </div>
    </section>   
            