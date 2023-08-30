
        <!-- Section -->
        <section class="pt-5 pb-5" data-bg-image="">
            <div class="container-fluid d-flex flex-column">
                <div class="row align-items-center min-vh-100">
                    <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                          <div class="card">
                            <div class="card-body py-5 px-sm-5">
                                <div>    <?php 

@$ingreso = new ControladorUsuarios();
@$ingreso -> ctrIngresoUsuario();

?></div>
                                <div class="mb-5 text-center">
                                    <h6 class="h3 mb-1">Login</h6>
                                    <p class="text-muted mb-0">Sign in to your account to continue.</p>
                                </div><span class="clearfix"></span>
                                <form method="POST"  class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required="" autofocus>
                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                    </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password">Password</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control" name="password" placeholder="Enter password" type="password" required="">
                                            <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
                                    </div>
                                    <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Sign in</button></div>
                                </form>
                                <div class="mt-4 text-center"><small>Not registered?</small> <a href="page-user-register.html" class="small fw-bold">Create account</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Section -->
    </div>

<script>

</script>