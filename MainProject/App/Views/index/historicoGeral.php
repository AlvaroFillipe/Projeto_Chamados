<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">             
              <!-- Table with stripped rows -->
              
               
              <table class="table datatable">
             
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Departamento</th>
                    <th>STATUS</th>
                    <th>Hora</th>
                    <th>Data</th>
                    <th>Visualizar</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($this->view->adminGetAllChamados as $adminGetAllChamados => $historico) { ?>
                
                  <tr>
                    <td><?=$historico['pk_id_chamado'];?></td>
                    <td><?=$historico['usuario'];?></td>
                    <td><?=$historico['departamento'];?></td>
                    <td>
                      <?php if ($historico['status_chamado'] == 1) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:red"><i class="bi bi-check-circle"></i></h4>
                        </div>
                      <?php } ?>
                      <?php if ($historico['status_chamado'] == 2) {?>
                        <div class="col-lg-3 col-md-8">
                          <h4 style="color:green"><i class="bi bi-check-circle-fill"></i></h4> 
                        </div>
                      <?php }?>
                    </td>
                    <td><?=$historico['hora_chamado'];?></td>
                    <td><?=$historico['data_chamado'];?></td>
                    <td>BOTAO DE VISUALIZAR CHAMADO</td>
                    
                  </tr>                  
                </tbody>
                <?php } ?>
              </table>
            
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


</body>
