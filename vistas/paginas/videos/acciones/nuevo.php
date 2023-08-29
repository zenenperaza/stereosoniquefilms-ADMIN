
    <section class="section">
      <div class=" ">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Registro de caso</h4>
              </div>
              <div class="card-body">
                                  <form method="POST" id="quickForm"  name="quickForm" enctype="multipart/form-data" class="needs-validation" novalidate autocomplete="off">
          
                    <fieldset class="form-group">
                      <div class="row">
                         <div class="col-form-label col-sm-2 pt-0">Tipo de caso</div>
                         <div class="col-sm-10">

                           <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="denuncia" name="tipo" value="Denuncia"
                              class="custom-control-input"  onclick="myFunction('denuncias','permisos','credenciales','remisiones','orientaciones')" required>
                            <label class="custom-control-label" for="denuncia"  onclick="myFunction('denuncias','permisos','credenciales','remisiones','orientaciones')">Denuncia</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="permiso" name="tipo"  value="Permiso viaje"
                              class="custom-control-input"  onclick="myFunction('permisos','denuncias','credenciales','remisiones','orientaciones')">
                            <label class="custom-control-label" for="permiso"  onclick="myFunction('permisos','denuncias','credenciales','remisiones','orientaciones')">Permiso de viaje</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="credencial" name="tipo"  value="Credencial trabajo"
                              class="custom-control-input"  onclick="myFunction('credenciales','denuncias','permisos','remisiones','orientaciones')">
                            <label class="custom-control-label" for="credencial"  onclick="myFunction('credenciales','denuncias','permisos','remisiones','orientaciones')">Solicitud de credencial de trabajo</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="remision" name="tipo"  value="Remision"
                              class="custom-control-input" onclick="myFunction('remisiones','denuncias','permisos','credenciales','orientaciones')">
                            <label class="custom-control-label" for="remision" onclick="myFunction('remisiones','denuncias','permisos','credenciales','orientaciones')">Remisiones a otros Org.</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="orientacion" name="tipo"  value="Orientacion"
                              class="custom-control-input"  onclick="myFunction('orientaciones','denuncias','permisos','remisiones','credenciales')">
                            <label class="custom-control-label" for="orientacion"  onclick="myFunction('orientaciones','denuncias','permisos','remisiones','credenciales')">Orientaciones</label>
                          </div>                           
                        </div>
                  </div>
                </fieldset>  
               
                
                  <!--                   FORM PERMISO DE DENUNCIAS -->
                <div class="card" id="general">
                  <div class="card-header">
                    <h4>Datos del solicitante </h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaSolicitante">Cédula</label>
                        <input type="number" name="cedulaSolicitante" id="cedulaSolicitante" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSolicitante">Nombre</label>
                      <input type="text" name="nombreSolicitante" id="nombreSolicitante"  class="form-control" placeholder="Nombre..." pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSolicitante">Apellido</label>
                      <input id="apellidoSolicitante" name="apellidoSolicitante" type="text" class="form-control" placeholder="Apellido..."  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                    </div>                  
                    <div class="form-group">
                      <label for="fechaNacimientoSolicitante">Fecha de nacimiento</label>               
                      <input type="text" name="fechaNacimientoSolicitante" id="fechaNacimientoSolicitante"  class="form-control" placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div> 
                    <div class="form-group">
                      <label for="edadSolicitante">Edad</label>
                      <input type="number" name="edadSolicitante" id="edadSolicitante" class="form-control" placeholder="Edad...">
                    </div> 

                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculino" name="sexoSolicitante" value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculino" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femenino" name="sexoSolicitante"  value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femenino" >Femenino</label>
                          </div>

                      </div>    
                    <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                      <select class="form-control" name="nacionalidadSolicitante" >
                        <option value="V">V</option>
                        <option value="E">E</option>
                        <option value="" id="nacionalidadSolicitante"></option>
                      </select>
                    </div>
                    <div class="form-row">
                    
                      <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                          <option value="Tachira">Táchira</option>
                        </select>
                      </div>     
                      <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                        <select id="municipio" class="form-control" name="municipio">
                          <option value="San Antonio">San Antonio</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="direccionSolicitante">Dirección</label>
                      <input type="text" class="form-control" name="direccionSolicitante" id="direccionSolicitante" placeholder="Dirección...">
                    </div>   
                    
                    

                  <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="5"></textarea>
                  </div>
                                 
                  </div>
                  <div class="card-footer">
               
                  </div>
                </div>

                
<!--                   FORM PERMISO DE DENUNCIAS -->
                <div class="card" id="denuncias" style="display:none">
                  
                  <div class="card-header">
                    <h4>Datos del NNA</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-group">
                      <div class="control-label"></div>
                      <label class="custom-switch mt-2">
                        <input type="checkbox" name="igualarAsolicitante" id="igualaAsolicitanter" class="custom-switch-input"  onchange="igualar(event)">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Igual al Solicitante</span>
                      </label>
                    </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaNNA">Cédula</label>
                        <input type="number"  name="cedulaNNA" id="cedulaNNA" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreNNA">Nombre</label>
                      <input type="text" name="nombreNNA" id="nombreNNA"  class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoNNA">Apellido</label>
                      <input  type="text" id="apellidoNNA"  name="apellidoNNA" class="form-control"pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                    </div>
                                                          
                    <div class="form-group">
                      <label for="fechaNacimientoNNA">Fecha de nacimiento</label>               
                      <input type="text" class="form-control" name="fechaNacimientoNNA" id="fechaNacimientoNNA"  placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div>
                    <div class="form-group">
                      <label for="edadNNA">Edad</label>
                      <input type="number" class="form-control" name="edadNNA" id="edadNNA" placeholder="Edad...">
                    </div>  
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculinoNNA" name="sexoNNA"  value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculinoNNA" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femeninoNNA" name="sexoNNA"  value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femeninoNNA" >Femenino</label>
                          </div>

                      </div> 
                    
                    <div class="form-group col-md-2">
                      <label  for="nacionalidadNNA">Nacionalidad</label>
                      <select class="form-control" name="nacionalidadNNA" >
                        <option value="V">V</option>
                        <option value="E">E</option>
                        <option value="" id="nacionalidadNNA"></option>
                      </select>
                    </div>                   
                      
                    <div class="form-group">
                      <label for="direccionNNA">Dirección</label>
                      <input type="text" class="form-control" name="direccionNNA" id="direccionNNA" placeholder="Dirección...">
                    </div>               
                    
                    <div class="form-group">
                      <label for="derechoVulnerado">Derecho vulnerado</label>
                      <input type="text" class="form-control" name="derechoVulnerado" id="derechoVulnerado" placeholder="Derecho vulnerado...">
                    </div> 
                                 
                  </div>
                  
                  
                  <div class="card-header">
                    <h4>Datos del particular o interesado (a) </h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaDenunciado">Cédula</label>
                        <input type="number"  name="cedulaDenunciado" id="cedulaDenunciado" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreDenunciado">Nombre</label>
                      <input type="text" name="nombreDenunciado" id="nombreDenunciado"  class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoDenunciado">Apellido</label>
                      <input id="apellidoDenunciado"  name="apellidoDenunciado" type="text" class="form-control"pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fechaNacimientoDenunciado">Fecha de nacimiento</label>               
                      <input type="text" class="form-control" name="fechaNacimientoDenunciado" id="fechaNacimientoDenunciado"   placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div>
                    <div class="form-group">
                      <label for="edadDenunciado">Edad</label>
                      <input type="number" class="form-control" name="edadDenunciado" id="edadDenunciado" placeholder="Edad..." >
                    </div> 
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculinoDenunciado" name="sexoDenunciado" value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculinoDenunciado" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femeninoDenunciado" name="sexoDenunciado" value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femeninoDenunciado" >Femenino</label>
                          </div>
                      </div>                    
                    
                    <div class="form-group col-md-2">
                      <label  for="nacionalidadDenunciado">Nacionalidad</label>
                      <select class="form-control" name="nacionalidadDenunciado" >
                        <option value="" id="nacionalidadDenunciado"></option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                      </select>
                    </div>   
                    
                    <div class="form-group">
                      <label for="direccionDenunciado">Dirección</label>
                      <input type="text" class="form-control" name="direccionDenunciado" id="direccionDenunciado" placeholder="Dirección...">
                    </div>
                    
                  </div> 
                  
                  <div class="card-header">
                    <h4>Datos de seguimiento </h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-group row">
                      <label for="medidas" class="col-sm-2 col-form-label control-label">Medidas de proteccion</label>
                      <div class="col-sm-8">  
                        <p> ¿Se requieren medidas de proteccion: SI o NO?</p>
                     <input type="checkbox" id="medidas" name="medidas" data-toggle="toggle" value="SI" data-on="SÍ" data-off="NO">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="ministerio" class="col-sm-2 col-form-label control-label">Ministerio Publico</label>
                      <div class="col-sm-8">  
                        <p> ¿Se requieren informar al MP: SI o NO?</p>
                     <input type="checkbox" id="ministerio" name="ministerio" data-toggle="toggle" value="SI" data-on="SÍ" data-off="NO">
                      </div>
                    </div>
                  </div>
             
                  
                </div>
                  
<!--                   FORM PERMISO DE VIAJES -->
                <div class="card" id="permisos" style="display:none">                    

                  <div class="card-header">
                    <h4>Permiso de viaje</h4>
                  </div>
                                         
                  <div class="card-header">
                    <h4>Datos del 2do Representante legal</h4>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaSegundoRepresentante">Cédula</label>
                        <input type="number"  name="cedulaSegundoRepresentante" id="cedulaSegundoRepresentante" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreSegundoRepresentante">Nombre</label>
                      <input type="text" name="nombreSegundoRepresentante" id="nombreSegundoRepresentante"  class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoSegundoRepresentante">Apellido</label>
                      <input id="apellidoSegundoRepresentante"  name="apellidoSegundoRepresentante" type="text" class="form-control"pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,30}">
                      </div>
                    </div>
                                   
                    <div class="form-group">
                      <label for="fechaNacimientoSegundoRepresentante">Fecha de nacimiento</label>               
                      <input type="text" class="form-control" name="fechaNacimientoSegundoRepresentante" id="fechaNacimientoSegundoRepresentante"   placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div>
                    <div class="form-group">
                      <label for="edadSegundoRepresentante">Edad</label>
                      <input type="number" class="form-control" name="edadSegundoRepresentante" id="edadSegundoRepresentante" placeholder="Edad...">
                    </div> 
                      <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculinoSegundoRepresentante" name="sexoSegundoRepresentante" value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculinoSegundoRepresentante" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femeninoSegundoRepresentante" name="sexoSegundoRepresentante"  value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femeninoSegundoRepresentante" >Femenino</label>
                          </div>

                      </div>   
                
                    <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                      <select class="form-control" name="nacionalidadSegundoRepresentante" >                        
                        <option value="" id="nacionalidadSegundoRepresentante"></option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="direccionSegundoRepresentante">Dirección</label>
                      <input type="text" class="form-control" name="direccionSegundoRepresentante" id="direccionSegundoRepresentante" placeholder="Dirección...">
                    </div>                       
                    </div>
                    
                  <div class="card-header">
                    <h5>Datos del NNA</h5>
                  </div>
                    
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaNNAViaje">Cédula</label>
                        <input type="number"  name="cedulaNNAViaje" id="cedulaNNAViaje" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreNNAViaje">Nombre</label>
                      <input id="nombreNNAViaje" type="text" class="form-control" name="nombreNNAViaje" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}"   >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoNNAViaje">Apellido</label>
                      <input id="apellidoNNAViaje" type="text" class="form-control" name="apellidoNNAViaje" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}">
                      </div>
                    </div>  
                     <div class="form-group">
                      <label for="fechaNacimientoNNAViaje">Fecha de nacimiento</label>               
                      <input type="text" class="form-control" name="fechaNacimientoNNAViaje" id="fechaNacimientoNNAViaje"   placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div>
                    <div class="form-group">
                      <label for="edadNNAViaje">Edad</label>
                      <input type="number" class="form-control" name="edadNNAViaje" id="edadNNAViaje" placeholder="Edad...">
                    </div>  
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculinoViaje" name="sexoNNAViaje" value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculinoViaje" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femeninoViaje" name="sexoNNAViaje" value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femeninoViaje" >Femenino</label>
                          </div>

                      </div>
                    
                    <div class="form-group col-md-2">
                      <label>Nacionalidad</label>
                      <select class="form-control" name="nacionalidadNNAViaje" >
                        <option id="nacionalidadNNAViaje"></option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                      </select>
                    </div>       
                    
                    <div class="form-group">
                      <label for="direccionNNAViaje">Dirección</label>
                      <input type="text" class="form-control" name="direccionNNAViaje" id="direccionNNAViaje" placeholder="Dirección...">
                    </div>
                    
                    <div class="card-header">
                    <h4>Datos de Viaje </h4>
                  </div>
                  <div class="card-body">  
                                      
                  <div class="form-row">
                    <div class="form-group mr-2">
                      <label for="inputAddress">Tipo de viaje: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="interior" name="tipoViaje" value="Interior"
                              class="custom-control-input"  onclick="myFunction(null,'exteriorInfo','null','null','null')">
                            <label class="custom-control-label" for="interior"  onclick="myFunction2('exteriorInfo')">Interior</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="exterior" name="tipoViaje" value="Exterior"
                              class="custom-control-input"  onclick="myFunction('exteriorInfo','null','null','null','null')">
                            <label class="custom-control-label" for="exterior"  onclick="myFunction('exteriorInfo','null','null','null','null')">Exterior</label>
                          </div>
                      </div>              
                      
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="destinoViaje">Destino</label>
                      <input id="destino" type="text" class="form-control" name="destinoViaje" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]{3,50}"   >
                      </div>
                    </div>  
                    <div id="exteriorInfo" style="display:none">
                    <div class="form-group row">
                      <label for="pasaporte" class="col-sm-2 col-form-labelcontrol-label">Información de identidad</label>
                      <div class="col-sm-8">  
                        <p> ¿Posee Pasaporte: SI o NO?</p>
                     <input type="checkbox" id="pasaporte" name="pasaporte" data-toggle="toggle" value="SI" data-on="SÍ" data-off="NO">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="visa" class="col-sm-2 col-form-labelcontrol-label">Ministerio Publico</label>
                      <div class="col-sm-8">  
                        <p> ¿Posee Visa: SI o NO?</p>
                     <input type="checkbox" id="visa" name="visa" data-toggle="toggle" value="SI" data-on="SÍ" data-off="NO">
                      </div>
                    </div>
                    </div>
                  </div>     
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
                  
<!--                   FORM PERMISO DE CREDENCIALES -->
                <div class="card" id="credenciales" style="display:none">
                  <div class="card-header">
                    <h4>Solicitud credenciales de trabajo</h4>
                  </div>
                  <div class="card-header">
                    <h5>Datos del adolescente trabajador(a)</h5>
                  </div>
                  <div class="card-body">
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedulaTrabajo">Cédula del adolescente</label>
                        <input type="number"  name="cedulaTrabajo" id="cedulaTrabajo" min="3000000" max="99999999" maxlength="8" class="form-control" placeholder="Ingresar Cédula del adolescente" autofocus>
                    </div>
                      </div>
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreTrabajo">Nombre</label>
                      <input id="nombreTrabajo" type="text" class="form-control" name="nombreTrabajo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}"   >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoTrabajo">Apellido</label>
                      <input id="apellidoTrabajo" type="text" class="form-control" name="apellidoTrabajo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{3,15}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fechaNacimientoTrabajo">Fecha de nacimiento</label>
               
                      <input type="text" class="form-control" name="fechaNacimientoTrabajo" id="fechaNacimientoTrabajo"   placeholder="dd/mm/yyyy"
                      onkeyup="
                          var v = this.value;
                          if (v.match(/^\d{2}$/) !== null) {
                              this.value = v + '/';
                          } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                              this.value = v + '/';
                          }"
                      maxlength="10" >
                    </div> 
                    
                    <div class="form-group">
                      <label for="edadTrabajo">Edad</label>
                      <input type="number" class="form-control" name="edadTrabajo" id="edadTrabajo" placeholder="Edad...">
                    </div> 
                    
                    
                    <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputAddress">Sexo: </label>
                    </div>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="masculinoTrabajo" name="sexoTrabajo" value="Masculino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="masculinoTrabajo" >Masculino</label>
                          </div>

                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="femeninoTrabajo" name="sexoTrabajo" value="Femenino"
                              class="custom-control-input" >
                            <label class="custom-control-label" for="femeninoTrabajo" >Femenino</label>
                          </div>

                      </div>
                    
                    <div class="form-group">
                      <label for="direccionTrabajo">Dirección</label>
                      <input type="text" class="form-control" id="direccionTrabajo" name="direccionTrabajo" placeholder="Dirección...">
                    </div>   
                      
                      <label for="constanciaMedica" class="col-sm-12 col-form-label control-label">Datos de estudios</label>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nombreEscuela">Escuela</label>
                      <input id="nombreEscuela" type="text" class="form-control" name="nombreEscuela" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="gradoEstudio">Grado</label>
                      <input id="gradoEstudio" type="text" class="form-control" name="gradoEstudio">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horarioEstudio">Horario clases</label>
                      <input id="horarioEstudio" type="text" class="form-control" name="horarioEstudio">
                      </div>
                    </div>                      
                      <label for="constanciaMedica" class="col-sm-12 col-form-label control-label">Datos de trabajo</label>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="lugarTrabajo">Lugar de trabajo</label>
                      <input id="lugarTrabajo" type="text" class="form-control" name="lugarTrabajo">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="tipoTrabajo">Tipo de trabajo</label>
                      <input id="tipoTrabajo" type="text" class="form-control" name="tipoTrabajo">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horarioTrabajo">Horario trabajo</label>
                      <input id="horarioTrabajo" type="text" class="form-control" name="horarioTrabajo">
                      </div>
                    </div>                    
                    
                    <div class="form-group">
                      <label for="fechaIngreso">Fecha de ingreso</label>               
                      <input type="date" class="form-control" name="fechaIngreso">
                    </div> 
                                
                    
                    <div class="form-group">
                      <label for="indicacionPatrono">Indicación patrono</label>               
                      <input id="indicacionPatrono" type="text" class="form-control" name="indicacionPatrono">
                    </div> 
                    
                    <div class="form-group row">
                      <label for="constanciaMedica" class="col-sm-2 col-form-label control-label">Constancia médica</label>
                      <div class="col-sm-8">  
                        <p> ¿Posee Constancia médica: SI o NO?</p>
                     <input type="checkbox" id="constanciaMedica" name="constanciaMedica" data-toggle="toggle" value="SI" data-on="SÍ" data-off="NO">
                      </div>
                    </div> 
                                 
                  </div>
                  <div class="card-footer">
                  </div>
                </div>                  
                  
<!--                   FORM PERMISO DE REMISIONES -->
                <div class="card" id="remisiones" style="display:none">
                  <div class="card-header">
                    <h4>Remisiones a otros Organismos</h4>
                  </div>
                  <div class="card-body">
                      
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombreOrganismo">Nombre del organismo</label>
                      <input id="nombreOrganismo" name="nombreOrganismo" type="text" class="form-control" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]{3,50}"   >
                      </div>
                    </div>               
                                 
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
                  
<!--                   FORM PERMISO DE ORIENTACIONES -->
                <div class="card" id="orientaciones" style="display:none">
                  <div class="card-header">
                    <h4>Orientaciones</h4>
                  </div>
                  <div class="card-body">
                  
                  <div class="form-group">
                    <label for="tipoOrientacion">Tipo de orientacion</label>
                      <input id="tipoOrientacion" name="tipoOrientacion" type="text" class="form-control"pattern="[a-zA-Z0-9ñÑáéí óúÁÉÍÓÚ ]{3,50}"   >
                  </div>
                                 
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
                  
                  
                 
                     
                  <div class="form-group">
                    <div class="buttons float-right">               
                      <button type="submit" class="btn btn-primary float-right" name="btnGuardarCaso">
                        Guardar caso
                      </button>
                        <?php
                          $casos = new ControladorCasos();
                          $casos -> ctrCrearCaso(); 
                      ?>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
      </div>
    </section> 

<script>

//Datemask dd/mm/yyyy


</script>
              