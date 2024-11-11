<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main" class="main">
      <div class="pagetitle">
        <h1>Perfil de Departaento</h1>
        
    </div><!-- End Page Title -->

    <?php if ($_SESSION['tipo_usuario'] == 1) {?>
    

    <section class="section profile">
      <div class="row">


        <div class="col-xl-6">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão de Departamento</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Departamento</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h4 class="card-title">Detalhes do Departameto</h4>

                  

                  <div class="row">
                    <div class="col-lg-6 col-md-4 label">Departamento</div>
                    <div class="col-lg-9 col-md-4">Departaeto deostracao</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="/editarDepartameto">                  

                    <fieldset class="row mb-4">
                      <legend class="col-form-label col-sm-4 pt-0">Departamento</legend>
                      <div class="col-md-12">
                        <select  name="departamento" id="inputState" class="form-select">
                            <option selected>Departaeto deostracao</option>
                            <?php foreach ($this->view->getAlldepartamentos as $departamentos => $departamento) {?>
                                <option  value="">Departaeto deostracao</option>
                            <?php }?>
                        </select>
                      </div>
                    </fieldset>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>         

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <div class="row">
            <div class="card">
              <div class="card-body">
                 <h5 class="card-title">Tabela de Departamentos</h5>

                <!-- Table with stripped rows -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>                     
                      <th scope="col">Departaento</th>

                      <th>Visualizar</th>
                      <th>Deletar</th>

                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <th scope="row" name="id">1</th>                        
                        <td>Departaeto deostracao</td>

                        <td>
                          <form action="showProfile" method="post">
                            <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario'];?>">
                            <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                          </form>
                        </td>
                        <td>
                          <form action="deleteUserAdmin" method="post">

                            <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario'];?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php
                    }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
      </div>
    </section>


    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tabela de Chamados ABERTOS </h2>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                  <th >#</th>
                    <th>Data do Chamado</th>
                    <th>Hora do Chamado</th>
                    <th>STATUS</th>
                    <th>Chamado</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->view->chamadosAbertos as $chamadosAbertos => $Chamado) {?>
                  <tr>
                    <td><?=$Chamado['pk_id_chamado'];?></td>
                    <td><?=$Chamado['data_chamado'];?></td>
                    <td><?=$Chamado['hora_chamado'];?></td>
                    <td>
                      <?php if ($Chamado['status_chamado'] == 1) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:red"><i class="bi bi-check-circle"></i></h4>
                        </div>
                      <?php } ?>
                      <?php if ($Chamado['status_chamado'] == 2) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:green"><i class="bi bi-check-circle-fill"></i></h4> 
                        </div>
                      <?php }?>
                    </td>
                    <td>
                      <form action="showChamado" method="post">
                        <input type="hidden" name="pk_id_chamado" value="<?=$Chamado['pk_id_chamado']?>">
                        <input type="hidden" name="fk_id_usuario" value="<?=$Chamado['fk_id_usuario']?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                      </form>
                    </td>

                    <td>                        
                      <form action="deleteChamadoAdmin" method="post">                          
                      <input type="hidden" name="pk_id_chamado" value="<?=$Chamado['pk_id_chamado']?>">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>                         
                      </form>                          
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tabela de Chamados FECHADOS</h2>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                  <th >#</th>
                    <th data-type="date" data-format="DD/MM/YYYY">Data do Chamado</th>
                    <th>STATUS</th>
                    <th>Chamado</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->view->chamadosFechados as $chamadosFechados => $Chamado) {?>
                  <tr>
                    <td><?=$Chamado['pk_id_chamado'];?></td>
                    <td><?=$Chamado['data_chamado'];?></td>
                    <td><?=$Chamado['hora_chamado'];?></td>
                    <td>
                      <?php if ($Chamado['status_chamado'] == 1) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:red"><i class="bi bi-check-circle"></i></h4>
                        </div>
                      <?php } ?>
                      <?php if ($Chamado['status_chamado'] == 2) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:green"><i class="bi bi-check-circle-fill"></i></h4> 
                        </div>
                      <?php }?>
                    </td>
                    <td>
                      <form action="showChamado" method="post">
                        <input type="hidden" name="pk_id_chamado" value="<?=$Chamado['pk_id_chamado']?>">
                        <input type="hidden" name="fk_id_usuario" value="<?=$Chamado['fk_id_usuario']?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                      </form>
                    </td>

                    <td>                        
                          <form action="deleteChamadoAdmin" method="post">                          
                          <input type="hidden" name="pk_id_chamado" value="<?=$Chamado['pk_id_chamado']?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>                         
                          </form>                          
                        </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
    

    

  </main><!-- End #main -->


</body>

</html>