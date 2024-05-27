<!DOCTYPE html>
<html lang="en">

<body>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Formulario de criação de Usuários</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/voltar">Home</a></li>
                    <li class="breadcrumb-item">Funções do Sistema</li>
                    <li class="breadcrumb-item active">Formulario de criação de Usuários</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">formulario de cadastro de usuarios </h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="post" action="createUser">
                                <div class="col-md-8">
                                    <label for="inputName5" class="form-label">Nome de Usuario</label>
                                    <input name="usuario" type="text" class="form-control" id="inputName5">
                                </div>

                                <div class="col-md-8">
                                    <label for="inputName4" class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" id="inputName4">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Senha</label>
                                    <input name="senha" type="password" class="form-control" id="inputEmail5">
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Tipo De Usuário</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios1" value="1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_usuario" id="gridRadios2" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Usuário Padrão
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Categoria Usuário</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios1" value="3" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Júnior
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios2" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Pleno
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="categoria_usuario" id="gridRadios3" value="1">
                                            <label class="form-check-label" for="gridRadios2">
                                                Senior
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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
