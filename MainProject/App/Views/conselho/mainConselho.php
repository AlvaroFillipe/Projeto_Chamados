<main id="main" class="main">

<div class="pagetitle"> 
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

      <section class="section">
      <div class="row">

        <div class="col-lg-6">

        
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Button Badges</h5>

              <button type="button" class="btn btn-primary mb-2">
                <a href="createFolderConselhoPage" style = "color:white">Criar Evento</a>
              </button>
              <button type="button" class="btn btn-secondary mb-2">
                Secondary <span class="badge bg-white text-secondary">4</span>
              </button>
              <button type="button" class="btn btn-success mb-2">
                Success <span class="badge bg-white text-success">4</span>
              </button>
              <button type="button" class="btn btn-danger mb-2">
                Danger <span class="badge bg-white text-danger">4</span>
              </button>
              <button type="button" class="btn btn-warning mb-2">
                Warning <span class="badge bg-white text-warning">4</span>
              </button>
              <button type="button" class="btn btn-info mb-2">
                Info <span class="badge bg-white text-info">4</span>
              </button>
              <button type="button" class="btn btn-light mb-2">
                Light <span class="badge bg-secondary text-light">4</span>
              </button>
              <button type="button" class="btn btn-dark mb-2">
                Dark <span class="badge bg-white text-dark">4</span>
              </button>
            </div>

          </div><!-- End Button Badges -->

          

        </div>

        <div class="col-lg-6">         
        <div class="card">
          <br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Pesquisa por tag</label>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text"><i class="bi bi-search"></i></span>
                    </div>   
                    <form action="" method="post">
                    <div class="input-group mb-3">    
                      <label for="inputText" class="col-sm-5 col-form-label">Pesquisa por Modalidade</label>                 
                      
                          <select  name="modalidade_evento" class="form-select" aria-label="Default select example">
                            <option selected>Selecione Modalidade de Evento</option>
                            <?php foreach ($this->view->getModalidadesEventosAtivos as $getEventosAtivos => $evento) { ?>
                              <option value="<?=$evento['pk_id_modalidade_evento']?>"><?=$evento['modalidade_evento']?></option>
                            <?php }?>                 
                          </select>
                          <button type="submit" ><span class="input-group-text"><i class="bi bi-search"></i></span></button>
                    </div>     
                    </form>             
                    
                 
                    </div>
                  </div>                  
                </div>
            </div>
            <br>
            <div class="card-body">
              
              </div>
            
          </div><!-- End Default Badges -->
        </div>

      </div>
    </section>
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Tabela de Eventos</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Evento</th>
                    <th scope="col">Data Do Evento</th>
                    <th scope="col">Data Criação Evetno</th>
                    <th scope="col">tag do evento</th>
                    <th scope="col">Visualizar</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($this->view->getEventosAtivos as $getEventosAtivos => $evento) {?>
                  <tr>                    
                    <th scope="row"><a href="#"><?=$evento['pk_id_evento']?></a></th>
                    <td><?=$evento['nome_evento']?></td>
                    <td><?=$evento['data_evento']?></td> 
                    <td><?=$evento['data_criacao_evento']?></td>    
                    <td><?=$evento['tag_evento']?></td>                    
                    <td>
                      <form action="show_evento_conselho" method="post">
                        <input type="hidden" name="pk_id_evento" value="<?=$evento['pk_id_evento'];?>">
                        <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                      </form>
                    </td>               
                  </tr> 
                  <?php }?>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->
      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->