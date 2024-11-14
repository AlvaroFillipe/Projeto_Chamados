<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">
    <?php foreach ( $this->view->usuarioGetChamado as $usuarioGetchamado => $chamado) {} ?>
    <?php foreach ($this->view->usuarioGetUsuario as $usuarioGetUsuario => $usuario) {} ?>

    <div class="pagetitle">
      <h1>Chamado</h1>
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
                    <?php if ($_SESSION['tipo_usuario'] ==  '1') {?>                      
                        <div class="card-body">                           
                          <!-- Disabled Backdrop Modal -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                          Fechar Chamado <i class="bi bi-check-circle-fill"></i>
                          </button>
                          <form action="responder_chamado" method="post">
                            <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Solucção do chamado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  
                                  <textarea  style="height: 300px;" name="solucao_chamado"></textarea>
                                  
                                  <div class="modal-footer">
                                    <input type="hidden" name="pk_id_chamado" value="<?= $chamado['pk_id_chamado']; ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div><!-- End Disabled Backdrop Modal-->
                          </form>

                        </div>
                         
                    <?php }?>
                  <h5 class="card-title">Detalhes do chamado</h5>
                  
                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>usuario</b></div>
                    <div class="col-lg-3 col-md-8"><?= $usuario['usuario'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Departamento</b></div>
                    <div class="col-lg-3 col-md-8"><?= $usuario['departamento'] ?></div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Data de abertura do Chamado</b></div>
                    <div class="col-lg-3 col-md-8"><?= $chamado['data_chamado'] ?></div>
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-lg-4 col-md-3 label"><b>Status do chamado</b></div>
                    <?php if ($chamado['status_chamado'] == 1) {?>
                      <div class="col-lg-3 col-md-8">
                        <h5 style="color:red"><i class="bi bi-check-circle"></i></h5>
                      </div>
                    <?php } ?>
                    <?php if ($chamado['status_chamado'] == 2) {?>
                      <div class="col-lg-3 col-md-8">
                        <h5 style="color:green"><i class="bi bi-check-circle-fill"></i></h5> 
                      </div>
                    <?php }?>                    
                  </div>

                  <?php if ($_SESSION['tipo_usuario'] == 1) {?>
                    <div class="row">
                      <div class="col-lg-4 col-md-3 label"><b>Solução do chamado</b></div>
                      <div class="col-lg-3 col-md-8"><?= $chamado['solucao_chamado'] ?></div>
                   </div>
                  <?php } ?>
                  

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