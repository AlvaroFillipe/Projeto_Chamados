<!DOCTYPE html>
<html lang="en">


<body>


  <main id="main" class="main">
    <?php
    foreach ($this->view->contentUsuario as $contentUsuario => $usuario) {
    }

    //logica da tabela para se o valor de tipo_usuario for 1 imprime 'admin' e se for 2 imprime 'padrao'
    if ($usuario['tipo_usuario'] == 1) {
      $usuario['tipo_usuario'] = 'Admin';
    } elseif ($usuario['tipo_usuario'] == 2) {
      $usuario['tipo_usuario'] = 'Padrão';
    }

    //logica da tabela para se o valor de categoria de usuario for 1 = senior, se for 2 pleno e se for 3 junior

    if ($usuario['categoria_usuario'] == 1) {
      $usuario['categoria_usuario'] = 'Senior';
    } elseif ($usuario['categoria_usuario'] == 2) {
      $usuario['categoria_usuario'] = 'Pleno';
    } elseif ($usuario['categoria_usuario'] == 3) {
      $usuario['categoria_usuario'] = 'Junior';
    }
    ?>

    <div class="pagetitle">
      <h1>Perfil de Usuário</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Perfil de Usuário</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2><?= $usuario['usuario'] ?></h2>
              <h3><?= $usuario['categoria_usuario'] ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

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
                    <div class="col-lg-9 col-md-8"><?= $usuario['usuario'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $usuario['email'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo de Usuario</div>
                    <div class="col-lg-9 col-md-8"><?= $usuario['tipo_usuario'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Categoria de Usuário</div>
                    <div class="col-lg-9 col-md-8"><?= $usuario['categoria_usuario'] ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="/editarPerfil">

                    <input type="hidden" name="pk_id_usuario" value="<?= $usuario['pk_id_usuario']?>">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Usuario</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="usuario" type="text" class="form-control" id="fullName" value="<?= $usuario['usuario'] ?>">
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="company" value="<?= $usuario['email'] ?>">
                      </div>
                    </div>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Tipo De Usuário</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios1" value="1">
                          <label class="form-check-label" for="gridRadios1">
                            Admin
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios2" value="2">
                          <label class="form-check-label" for="gridRadios2">
                            Usuário Padrão
                          </label>
                        </div>
                      </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Categoria Usuário</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios1" value="3">
                          <label class="form-check-label" for="gridRadios1">
                            Júnior
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios2" value="2">
                          <label class="form-check-label" for="gridRadios2">
                            Pleno
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios3" value="1">
                          <label class="form-check-label" for="gridRadios2">
                            Senior
                          </label>
                        </div>
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
                        <input type="hidden" name="pk_id_usuario" value="<?= $usuario['pk_id_usuario'] ?>">
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
      </div>
    </section>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tabela de Apostas</h2>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>                  
                  <tr>
                                      
                    <th><b>Site Da Aposta</ b></th>                    
                    <th data-type="date" data-format="DD/MM/YYYY">Data da Aposta</th>
                    <th>Status</th>
                    <th>Editar</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($this->view->contentAposta as $contentAposta => $value) { ?>
                 
                  <tr>
                    
                    <td><?= $value['nome_site'];?></td>   
                    <td ><?= $value['data_bet'];?></td> 
                    <td>
                      <?php  if ($value['resultado_aposta'] >= 0) { ?>                       
                        <h5 style="color: green;"> R$ <?= $value['resultado_aposta']?></h5>
                      <?php }?> 

                      <?php  if ($value['resultado_aposta'] <= 0) { ?>                       
                        <h5 style="color: red;"> R$ <?= $value['resultado_aposta']?></h5>
                      <?php }?>                   
                      
                    </td>                     
                    <td>
                     
                      
                      <form action="showAposta" method="post">
                        <input type="hidden" name="fk_id_usuario" value="<?=$value['fk_id_usuario']?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
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