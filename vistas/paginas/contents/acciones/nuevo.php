<section id="page-content" style="background-color:#c4dadf;" class="mb-5">
    <div class="container">
        <div class="row">
            <div class="content col-lg-9">
                        <h3>Alta de Contents</h3>
                <form method="post" enctype='multipart/form-data'>
                    <div class="form-group row">
                            <label for="titulo" class="col-3 col-form-label">Título de la canción</label>
                            <div class="col-9">
                                <input class="form-control" type="text" placeholder="Escriba un título" name="titulo" id="titulo" required>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="artista" class="col-3 col-form-label">Descripción</label>
                            <div class="col-9">
                            <textarea id="summernote" name="descripcion"  required>
                                Place <em>some</em> <u>text</u> <strong>here</strong>
                            </textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="cargo" class="col-3 col-form-label">Cargo</label>
                            <div class="col-9">
                                <input class="form-control" type="text" placeholder="Escriba el cargo" name="cargo" id="cargo" required>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <label for="imdb" class="col-3 col-form-label">Links IMDB</label>
                            <div class="col-9">
                                <input class="form-control" type="text" placeholder="Escriba el imdb" name="imdb" id="imdb" required>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <label for="trailer" class="col-3 col-form-label">Links Trailer</label>
                            <div class="col-9">
                                <input class="form-control" type="text" placeholder="Escriba el trailer" name="trailer" id="trailer" required>
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="cantante" class="col-3 col-form-label">Seleccione la imagen</label>
                            <div class="col-9 d-flex justify-content-between">
                            <input type="file" class="form-control-file" name="imagen" id="imagen" accept="image/png, image/jpeg"  required>
                            <img src="images/5.jpg" class="img-thumbnail previsualizar" width="150px" height="150px"> 
                            </div>
                           
                    </div>

                            
                        <button type="submit"  name="btnCrearContent" class="btn m-t-30 mt-3">Guardar</button>

                          
                </form>
            </div>
        </div>
    </div>
</section>
        