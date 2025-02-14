<html>
<body>
<main id="main" class="main">
<?php foreach ($this->view->getEventoAtivo as $getEventoAtivo => $evento) {}?>

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
         <!-- LADO DA DIREITA DA TELA -->

      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Arquivos Do Evento</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Adicionar Arquivos</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Profile Details</h5>
                   
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome da Pasta</div>
                  <div class="col-lg-9 col-md-8"><?=$evento['nome_evento']?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Data da criação do evento</div>
                  <div class="col-lg-9 col-md-8"><?=$evento['data_criacao_evento']?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Data da Criação da pasta</div>
                  <div class="col-lg-9 col-md-8"><?=$evento['data_evento']?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">tag Do Evento</div>
                  <div class="col-lg-9 col-md-8"><?=$evento['tag_evento']?></div>
                </div>                
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Ext.</th>
                    <th>City</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                    <th>Completion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Unity Pugh</td>
                    <td>9958</td>
                    <td>Curicó</td>
                    <td>2005/02/11</td>
                    <td>37%</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
    <!-- formulario para incluuir arquivo -->
    <form method="post" action="/createFolderConselho">
                    <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nome da pasta</label>
                    <div class="col-sm-6">
                        <input name="nome" type="text" class="form-control">
                    </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Modalidade deArquivo</label>
                      <div class="col-sm-6">
                          <select  name="select" class="form-select" aria-label="Default select example">
                          <option selected>Selecione a Modalidade</option>
                          <?php foreach ($this->view->getModaliadesArquivosAtivas as $getModaliadesArquivosAtivas => $modalidade) {?>
                            <option value="<?=$modalidade['pk_id_modalidade_arquivo']?>"><?=$modalidade['modalidade_arquivo']?></option>                          
                          <?php } ?>
                          
                          </select>
                      </div>
                    </div>           


                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                      <div class="col-sm-6">
                          <input name="fileUpload" class="form-control" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="row mb-3">
                    
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit Form</button>
                      </div>
                    </div>

                </form><!-- End formulario para incluuir arquivo -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


<script src="assets/js/main.js"></script>

</body>
</html>