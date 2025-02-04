<!DOCTYPE html>
<html lang="en">


<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario de Registro de Chamados Feitos pelo usuario administrador</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="reportChamado" method="post">
                <?php foreach ($this->view->adminGetUsuario as $adminGetUsuario => $usuario) {}?>                 
           

                <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario']?>">
                <input type="hidden" name="fk_id_departamento" value="<?=$usuario['fk_id_departamento']?>">
                <input type="hidden" name="solucao_chamado" value="Chamado em Aberto">
                <input type="hidden" name="status_chamado" value="1">

                <div class="col-md-10">
                  

                  <br>

                  <div class="col-12">
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Chamado</label>
                    <div class="col-sm-10">
                      <textarea  name="chamado" class="form-control" style="height: 100px"></textarea>
                    </div>
                  </div>
                </div>


                </div>





                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->


</body>

</html>