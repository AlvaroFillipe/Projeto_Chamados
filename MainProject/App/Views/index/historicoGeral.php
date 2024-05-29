<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabela de Historico Geral</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
           <li class="breadcrumb-item">Histórico</li>
          <li class="breadcrumb-item active">Tabela de Historico Geral</li>
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
                    <th>
                      <b>#</b>
                    </th>
                    <th>Usuário</th>
                    <th>Data do Chamado</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->view->historicoChamados as $historicoChamados => $historico) {?>               
                  <tr>
                    <td><?= $historico['pk_id_chamado']?></td>
                    <td>USUARIO</td>
                    <td><?= $historico['data_chamado']?></td>
                    <td>STATUS</td>

                    
                    <td>
                          <form action="showProfileAdmin" method="post">
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
                  <?php }?>
                 
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