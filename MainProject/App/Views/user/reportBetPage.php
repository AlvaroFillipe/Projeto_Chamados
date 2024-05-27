<!DOCTYPE html>
<html lang="en">


<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario de Registro de Apostas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Funções do Usuario</li>
          <li class="breadcrumb-item active">Formulario de Registro de Apostas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="reportBet" method="post">

                <input type="hidden" name="pk_id_usuario" value="<?= $_SESSION['pk_id_usuario'] ?>">

                <div class="col-md-10">
                  <label for="inputState" class="form-label">Site</label>


                  <select id="inputState" class="form-select" name="pk_id_site_aposta">
                    <option selected>Selecione um Site</option>
                    <?php foreach ($this->view->getAllsites as $getAllsites => $site) { ?>
                      <option value="<?= $site['pk_id_site_aposta'] ?>"><?= $site['url_site'] ?></option>
                    <?php } ?>
                  </select>


                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Valor Apostado</label>
                  <input type="number" step="0.01" class="form-control" id="inputEmail5" name="valor_aposta">
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Valor Recebido</label>
                  <input type="number" step="0.01" class="form-control" id="inputPassword5" name="retorno_aposta">
                </div>

                <div class="col-7">
                  <label for="inputAddress5" class="form-label">Identificação da Mesa</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="ID Mesa" name="id_aposta">
                </div>

                <div class="col-5">
                  <label for="inputAddress2" class="form-label">Data da Aposta</label>
                  <input type="date" class="form-control" id="inputAddress2" name="data_aposta">
                </div>

                <input type="hidden" name="resultado_aposta">

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->


</body>

</html>