<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario Adicionar Sites</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Funções do Sistema</li>
          <li class="breadcrumb-item active">Formulario Adicionar Sites</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adicionar Site</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="/addSite">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="nome_site" type="text" class="form-control" id="floatingName" placeholder="Nome do Site">
                    <label for="floatingName">Nome do Site</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="url_site" type="text" class="form-control" id="floatingEmail" placeholder="Your Email">
                    <label for="floatingEmail">URL do Site</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input name="taxa_junior" type="number" class="form-control" id="floatingPassword" placeholder="Taxa usuario Junior">
                    <label for="floatingPassword">Taxa Usuario Junior</label>
                  </div>
                </div>               
                <div class="col-md-4">
                  <div class="form-floating">
                    <input name="taxa_pleno" type="number" class="form-control" id="floatingPassword" placeholder="Taxa Usuario Pleno">
                    <label for="floatingPassword">Taxa Usuario Pleno</label>
                  </div>
                </div>  
                <div class="col-md-4">
                  <div class="form-floating">
                    <input name="taxa_senior" type="number" class="form-control" id="floatingPassword" placeholder="Taxa Usuario Senior">
                    <label for="floatingPassword">Taxa Usuario Senior</label>
                  </div>
                </div>  
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
</body>

</html>