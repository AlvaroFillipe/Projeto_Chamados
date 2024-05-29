<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">
    <?php foreach ( $this->view->usuarioGetChamado as $usuarioGetchamado => $chamado) {} ?>
    <?php foreach ($this->view->adminGetUsuario as $adminGetUsuario => $usuario) {} ?>

    <div class="pagetitle">
      <h1>Chamado</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Usuario</li>
          <li class="breadcrumb-item active">Chamado</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Chamado Detalhada</h5>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
                </li>
                

              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">


                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">

                  <h5 class="card-title">Detalhes do chamado</h5>
                  
                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>usuario</b></div>
                    <div class="col-lg-3 col-md-8"><?= $usuario['usuario'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Departamento</b></div>
                    <div class="col-lg-3 col-md-8"><?= $chamado['departamento'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Data de abertura do Chamado</b></div>
                    <div class="col-lg-3 col-md-8"><?= $chamado['data_chamado'] ?></div>
                  </div>
                  <br>
                  <br>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Chamado</b></div>
                    <div class="col-lg-8 col-md-8"><?= $chamado['chamado'] ?></div>
                  </div>
                  
                </div>


               

              </div><!-- End Default Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


</body>

</html>