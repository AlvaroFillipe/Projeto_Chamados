<!DOCTYPE html>
<html lang="en">

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
       <div class="col-lg-6">
          <div class="row">
            <div class="card">
              <div class="card-body">
                 <h5 class="card-title">Tabela de usuarios</h5>

                <!-- Table with stripped rows -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Tipo de usuario</th>

                      <th>Visualizar</th>
                      <th>Deletar</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->view->adminGetUsers as $adminGetUsers => $usuario) {
                      //logica da tabela para se o valor de tipo_usuario for 1 imprime 'admin' e se for 2 imprime 'padrao'
                      if ($usuario['tipo_usuario'] == 1) {
                          $usuario['tipo_usuario'] = 'Admin';
                      } elseif ($usuario['tipo_usuario'] == 2) {
                          $usuario['tipo_usuario'] = 'Padrão';
                      }

                      //logica da tabela para se o valor de categoria de usuario for 1 = senior, se for 2 pleno e se for 3 junior

                      ?>
                      <tr>
                        <th scope="row" name="id"><?=$usuario['pk_id_usuario'];?></th>
                        <td><?=$usuario['usuario'];?></td>
                        <td><?=$usuario['tipo_usuario'];?></td>

                        <td>
                          <form action="showProfile" method="post">
                            <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario'];?>">
                            <button type="submit" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
                          </form>
                        </td>
                        <td>
                          <form action="deleteUserAdmin" method="post">

                            <input type="hidden" name="pk_id_usuario" value="<?=$usuario['pk_id_usuario'];?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php
                    }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>


            </div>
    </section>

  </main><!-- End #main -->



</body>


</html>