<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Elements</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Elements</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">General Form Elements</h5>

          <!-- General Form Elements -->
          <form method="post" action="/create_evento_conselho">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nome da pasta</label>
              <div class="col-sm-6">
                <input name="nome_evento" type="text" class="form-control">
              </div>
            </div>         
            
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Data Do Evento</label>
              <div class="col-sm-6">
                <input name="data_evento"type="date" class="form-control">
              </div>
            </div>            
          
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Assunto ou tag</label>
              <div class="col-sm-6">
                <textarea name="tag_evento" class="form-control" style="height: 100px"></textarea>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Categoria do Evento</label>
              <div class="col-sm-6">
                <select  name="modalidade_evento" class="form-select" aria-label="Default select example">
                  <option selected>Selecione Modalidade de Evento</option>
                  <?php foreach ( $this->view->getEventosAtivos as $getEventosAtivos => $evento) { ?>
                    <option value="<?=$evento['pk_id_modalidade_evento']?>"><?=$evento['modalidade_evento']?></option>
                  <?php }?>                 
                </select>
              </div>
            </div>           

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit Form</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
