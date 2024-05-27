<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                  

                <div class="card-body">

                  <h5 class="card-title">Apostas feitas <span>| Todas as apostas</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <?php foreach ($this->view->contadorApostas as $contadorApostas => $apostas) {}?>
                        
                     
                      <h6><?= $apostas['apostas_feitas']?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-8">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Investimentos <span>| Este Mês</span></h5>
                  <?php foreach ($this->view->somaGanhos as $somaGanhos => $ganhos){}?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $ganhos['resultado']?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
     
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
                    <th>Resultado da Aposta</th>
                    <th>Editar</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $this->view->userGetApostas as $userGetApostas => $value) { ?>
                 
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
                            <input type="hidden" name="id_usuario" value="<?=$value['fk_site_aposta']?>">
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