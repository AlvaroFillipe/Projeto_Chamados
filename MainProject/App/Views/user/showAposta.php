<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">
    <?php foreach ($this->view->usuarioGetApostas as $usuarioGetApostas => $aposta) {
    } ?>

    <div class="pagetitle">
      <h1>Aposta</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Usuario</li>
          <li class="breadcrumb-item active">Aposta</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aposta Detalhada</h5>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Editar</button>
                </li>

              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">


                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">

                  <h5 class="card-title">Detalhes da Aposta</h5>
                  
                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Valor Apostado</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['value_bet'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Retorno</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['value_recept'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Site da Aposta</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['nome_site'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>URL do site</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['url_site'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>ID da Aposta</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['id_bet'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-7 label"><b>Taxa de Retorno para Junior</b></div>
                    <div class="col-lg-2 col-md-1"><?= $aposta['tax_junior'] ?> R$</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-7 label"><b>Taxa de Retorno para Pleno</b></div>
                    <div class="col-lg-2 col-md-1"><?= $aposta['tax_pleno'] ?> R$</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-7 label"><b>Taxa de retorno para Senior</b></div>
                    <div class="col-lg-2 col-md-1"><?= $aposta['tax_senior'] ?> R$</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Data da Aposta</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['data_bet'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Data de registro da Aposta</b></div>
                    <div class="col-lg-3 col-md-8"><?= $aposta['data_report'] ?></div>
                  </div>
                </div>


                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                  
                
                <!-- Profile Edit Form -->
                  <form method="post" action="edit_aposta">

                  <input type="hidden" name="fk_id_usuario" value="<?= $aposta['fk_id_usuario']?>">

                    <div class="row mb-3">
                      <label for="valor_apostado" class="col-md-4 col-lg-3 col-form-label">Valor Apostado</label>
                      <div class="col-md-8 col-lg-9">
                        <input step="0.01" name="valor_apostado" type="number" class="form-control" id="fullName" value="<?= $aposta['value_bet'] ?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="retorno_aposta" class="col-md-4 col-lg-3 col-form-label">Retorno da Aposta</label>
                      <div class="col-md-8 col-lg-9">
                        <input step="0.01" name="retorno_aposta" type="number" class="form-control" id="fullName" value="<?= $aposta['value_recept'] ?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="id_aposta" class="col-md-4 col-lg-3 col-form-label">ID da Aposta</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="id_aposta" type="text" class="form-control" id="fullName" value="<?= $aposta['id_bet'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="id_aposta" class="col-md-4 col-lg-3 col-form-label">Site da Aposta</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="inputState" class="form-select" name="pk_id_site_aposta">
                          <?php foreach ($this->view->getAllsites as $getAllsites => $site) { ?>
                            <option value="<?= $site['pk_id_site_aposta'] ?>"><?= $site['url_site'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="data_bet" class="col-md-4 col-lg-3 col-form-label">Data da Aposta</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="data_bet" type="text" class="form-control" id="fullName" value="<?= $aposta['data_bet'] ?>">
                      </div>
                    </div>

                    <input type="hidden" name="resultado_aposta">
                    <input type="hidden" name="pk_id_aposta" value="<?=$aposta['pk_id_aposta']?>">

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

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