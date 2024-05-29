<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <!--<img src="assets/img/logo.png" alt="">-->
                <span class="d-none d-lg-block">Chamados Juventus</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">                  
                </div>
                <form class="row g-3 needs-validation" action="/autenticar" method='post'>

                  <div class="col-12">
                    <label for="yourUsername"  class="form-label">Usuario</label>
                    <div class="input-group has-validation">
                      <input type="text" name="usuario" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>  
                  <div class="card">
                    <div class="card-body">
                      <?php if ($this->view->login == 'erro'){ ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <i class="bi bi-exclamation-octagon me-1"></i>
                            Senha ou usuario INCORRETOS !!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      <?php } ?>
                    </div>
                  </div>                  
                </form>
              </div>
            </div>             
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
