<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main" class="main">
    <?php
  foreach ($this->view->contentUsuario as $contentUsuario => $usuario) {}
  

  //logica da tabela para se o valor de tipo_usuario for 1 imprime 'admin' e se for 2 imprime 'padrao'
  if ($usuario['tipo_usuario'] == 1) {
      $usuario['tipo_usuario'] = 'Admin';
  } elseif ($usuario['tipo_usuario'] == 2) {
      $usuario['tipo_usuario'] = 'Padrão';
  }
  ?>

      <div class="pagetitle">
        <h1>Perfil de Usuário</h1>
        
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão de Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>



                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar Senha</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h4 class="card-title">Detalhes do Perfil</h4>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?=$usuario['usuario']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$usuario['email']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo de Usuario</div>
                    <div class="col-lg-9 col-md-8"><?=$usuario['tipo_usuario']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Departamento</div>
                    <div class="col-lg-9 col-md-8"><?=$usuario['departamento']?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="/editarPerfil">

                    <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario']?>">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Usuario</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="usuario" type="text" class="form-control" id="fullName" value="<?=$usuario['usuario']?>">
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="company" value="<?=$usuario['email']?>">
                      </div>
                    </div>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-6 pt-0">Tipo De Usuário</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios1" value="1">
                          <label class="form-check-label" for="gridRadios1">
                            Admin
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios2" value="2" checked>
                          <label class="form-check-label" for="gridRadios2">
                            Usuário Padrão
                          </label>
                        </div>
                      </div>
                    </fieldset>

                    <fieldset class="row mb-4">
                      <legend class="col-form-label col-sm-4 pt-0">Departamento</legend>
                      <div class="col-md-12">
                        <select  name="departamento" id="inputState" class="form-select">
                            <option selected><?=$usuario['departamento']?></option>
                            <?php foreach ($this->view->getAlldepartamentos as $departamentos => $departamento) {?>
                                <option  value="<?=$departamento['pk_id_departamento']?>"><?=$departamento['departamento']?></option>
                            <?php }?>
                        </select>
                      </div>
                    </fieldset>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="/mudarSenhaAdmin">

                    <div class="row mb-3">


                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario']?>">
                        <input name="senha" type="password" class="form-control" id="newPassword">
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

        <div class="col-lg-6">
          <div class="row">
            <div class="card">
              <div class="card-body">
                 <h5 class="card-title">Tabela de usuarios</h5>

                <!-- Table with stripped rows -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Tipo de usuario</th>

                      <th>Visualizar</th>
                      <th>Deletar</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->view->adminGetUsers as $adminGetUsers => $usuario) {
                      //logica da tabela para se o valor de tipo_usuario for 1 imprime 'admin' e se for 2 imprime 'padrao'
                      if ($usuario['tipo_usuario'] == 1) {
                          $usuario['tipo_usuario'] = 'Admin';
                      } elseif ($usuario['tipo_usuario'] == 2) {
                          $usuario['tipo_usuario'] = 'Padrão';
                      }

                      //logica da tabela para se o valor de categoria de usuario for 1 = senior, se for 2 pleno e se for 3 junior

                      ?>
                      <tr>
                        <th scope="row" name="id"><?=$usuario['pk_id_usuario'];?></th>
                        <td><?=$usuario['usuario'];?></td>
                        <td><?=$usuario['tipo_usuario'];?></td>

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

<?php }?>
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tabela de Chamados ABERTOS</h2>


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
                  <?php foreach ($this->view->chamadosAbertos as $chamadosAbertos => $Chamado) {?>
                  <tr>
                    <td><?=$Chamado['pk_id_chamado'];?></td>
                    <td><?=$Chamado['data_chamado'];?></td>
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