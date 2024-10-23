<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>

      <button  type="button" class="btn btn-outline-primary btn-lg "><a href="/reportChamadoPage">Abrir Chamado</a></button>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            

     
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tabela de Chamados</h2>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>                  
                  <tr>
                                      
                    <th><b>#</b></th>
                    <th><b>Usuario</b></th>                    
                    <th data-type="date" data-format="DD/MM/YYYY"><b>Data do Chamado</b></th>
                    <th data-type="date" data-format="DD/MM/YYYY"><b>Hora Chamado</b></th>                    
                    <th><b>Visualizar</b></th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $this->view->userGetChamados as $userGetChamados => $chamado) { ?>
                    <?php foreach($this->view->adminGetUsuario as $adminGetUsuario => $usuario) {} ?>
                    
                  <tr>
                    
                    <td><?= $chamado['pk_id_chamado'];?></td>   
                    <td ><?= $usuario['usuario'];?></td> 
                    <td ><?= $chamado['data_chamado'];?></td>
                    <td ><?= $chamado['hora_chamado'];?></td>
                                                         
                    <td>
                          <form action="showChamado" method="post">
                            <input type="hidden" name="pk_id_chamado" value="<?=$chamado['pk_id_chamado']?>">
                            <input type="hidden" name="fk_id_usuario" value="<?=$chamado['fk_id_usuario']?>">
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