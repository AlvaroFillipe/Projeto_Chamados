<html>
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">

      
<!-- LADO ESQUERDO DA TELA -->
        <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para adiconar usuário</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Nome do usuário</label>
                  <input type="text" class="form-control" id="inputName5">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password</label>
                  <input type="password" class="form-control" id="inputPassword5">
                </div>
                
                <div class="col-md-6">
                <fieldset class="row mb-3">
                  
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Usuario Padrão
                      </label>
                    </div>                    
                  </div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Usuario Admin
                      </label>
                    </div>                    
                  </div>
                </fieldset>
                </div>

                <div class="col-md-4">
                  <label for="inputState" class="form-label">Departamento</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
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
                    <th>Botão de Visualizar</th>
                    <th>Botão de excluir</th>                    
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
          </div>

        </div>












<!-- LADO DIREITO DA TELA -->

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para Adicionar Departamento</h5>

              <!-- Vertical Form -->
              <form class="row g-3">
              <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
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
                    
                    <th>Botão de Visualizar</th>
                    <th>Botão de excluir</th>     
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Unity Pugh</td>
                    <td>9958</td>
                    <td>Curicó</td>
                    <td>2005/02/11</td>
                    
                  </tr>
       
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