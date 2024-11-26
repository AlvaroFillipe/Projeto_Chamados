<html>
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">

      
<!-- LADO ESQUERDO DA TELA -->
        <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para adiconar usuário</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" action="createUser">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Nome do usuário</label>
                  <input name="usuario"type="text" class="form-control" id="inputName5">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password</label>
                  <input name="senha" type="password" class="form-control" id="inputPassword5">
                </div>
                
                <div class="col-md-6">
                <fieldset class="row mb-3">
                  
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input value="2" name="tipo_usuario" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Usuario Padrão
                      </label>
                    </div>                    
                  </div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input value="1" name="tipo_usuario" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"c>
                      <label class="form-check-label" for="gridRadios1">
                        Usuario Admin
                      </label>
                    </div>                    
                  </div>
                  <div class="col-sm-12">
                    <div class="form-check">
                      <input value="3" name="tipo_usuario" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                      <label class="form-check-label" for="gridRadios1">
                        Usuario Visualizador
                      </label>
                    </div>                    
                  </div>
                </fieldset>
                </div>

                <div class="col-md-12">
                  <label for="inputState" class="form-label">Departamento</label>
                  <select  name="departamento" id="inputState" class="form-select">
                      <option selected>Departamentos...</option>
                      <?php foreach ($this->view->getAlldepartamentos as $departamentos => $departamento) {?>
                          <option  value="<?=$departamento['pk_id_departamento']?>"><?=$departamento['departamento']?></option>
                      <?php }?>
                  </select>
                </div>               
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabela de Usuarios</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b># ID</b>
                    </th>
                    <th>Usuário</th>
                    <th>Tipo Usuario</th> 
                    <th></th>
                    <th></th>                    
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
                    <td><?=$usuario['pk_id_usuario'];?></td>
                    <td><?=$usuario['usuario'];?></td>
                    <td><?=$usuario['tipo_usuario'];?></td>
                    <td>
                      <form action="showProfile" method="post">
                        <input type="hidden" name="pk_id_usuario" value="<?= $usuario['pk_id_usuario']; ?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                      </form>
                    </td> 
                    <td>
                      <form action="deleteUserAdmin" method="post">                                              
                        <input type="hidden" name="pk_id_usuario" value="<?= $usuario['pk_id_usuario']; ?>">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>                         
                      </form>     
                    </td>
                  </tr>
                  <?php } ?>
               
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>












<!-- LADO DIREITO DA TELA -->

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para Adicionar Departamento</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="add_departamento">
              <div class="col-12">
                  <div class="form-floating">
                    <textarea name="departamento" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Nome do Departamento</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabela de Departamentos</h5>
<!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b># ID</b>
                    </th>
                    <th>Departamento</th>                    
                    <th></th>                        
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->view->getAlldepartamentos as $departamentos => $departamento) {?>
                    <tr>
                   
                      <td><?= $departamento['pk_id_departamento']; ?></td>
                      <td><?= $departamento['departamento']; ?></td>   
                      <td>
                        <form action="show_departamento" method="post">
                        <input type="hidden" name="pk_id_departamento" value="<?= $departamento['pk_id_departamento']; ?>">
                          <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                        </form>
                      </td>                  
                      <td>    
                        <form action="delete_departamento" method="post">  
                          <input type="hidden" name="pk_id_departamento" value="<?= $departamento['pk_id_departamento']; ?>">       
                          <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>                                                   
                        </form> 
                      </td>    
                                    
                  </tr>
                  <?php } ?>        
                </tbody>
              </table>
              <!-- End Table with stripped rows -->









            </div>
          </div>         

        </div>
      </div>
    </section>

  </main><!-- End #main -->
</body>
</html>