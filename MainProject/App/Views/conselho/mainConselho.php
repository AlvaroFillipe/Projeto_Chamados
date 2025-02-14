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

         <div class="card">
            <div class="card-body">
              <br>             
              <a href="/createFolderConselhoPage"><button type="button" class="btn btn-success btn-lg">Criar Evento</button></a>
            
            </div>
          </div>

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

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