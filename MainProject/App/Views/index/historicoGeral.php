<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Historico de Chamados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item">Usuario</li>
          <li class="breadcrumb-item active">Historico de chamados</li>
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
                    <th></th>
                    <?php if ($_SESSION['tipo_usuario'] == 1) {?>
                      <th></th>
                    <?php } ?>
                   
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
                    <!--BOTAO DE VER CHAMADO-->
                    <td>
                      <form action="showChamado" method="post">
                        <input type="hidden" name="pk_id_chamado" value="<?=$historico['pk_id_chamado']?>">
                        <input type="hidden" name="fk_id_usuario" value="<?=$historico['fk_id_usuario']?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                      </form>
                    </td>  
                    <?php if ($_SESSION['tipo_usuario'] == 1) {?>
                    <!--BOTAO DE EXCLUIR CHAMADO-->
                    <td>                        
                      <form action="deleteChamadoAdmin" method="post">                          
                      <input type="hidden" name="pk_id_chamado" value="<?=$historico['pk_id_chamado']?>">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>                         
                      </form>                          
                    </td>
                    <?php }?>
                    
                    
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
