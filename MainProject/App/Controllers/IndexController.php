<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

//as functions dessa classe representam as actions presentes em "Views/Route.php"

class IndexController extends Action
{
    //render para a pagina de login
    public function login()
    { //pagina para ser chamada e em seguida o laypout

        //metodo criado para fazer render do alerta de usuario incorreto, se na url tiver ['login'] ele vai pégar-la e incluir o que estiver nela,caso o contrario ele vai incluir a url vaia [''] = ''
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

        $this->render('login');
    }

    //render para pagina de admin
    public function admin()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] != 2) {

            $getUsers = Container::getModel('Admin');

            //logica da tabela de usuarios
            $adminGetUsers = $getUsers->adminGetUsuarios();

            $this->view->adminGetUsers = $adminGetUsers;

            //logica para pegar os valores da tabela de usuarios para um formulario

            $this->render('admin', 'adminLayout');
        } else {
            header('Location: /');
        }
    }

    //render para pagina de usuario padrão
    public function user()
    {
        session_start();
        $chamado = Container::getModel('Chamado');
        $usuario = Container::getModel('Admin');

        $chamado->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
        $usuario->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);

        //logica que exibe todas as informações do usuario
        $this->view->adminGetUsuario = $usuario->adminGetUsuario();
        


        //logica da tabela que ira exibir todas as chamados
        $this->view->userGetChamados = $chamado->userGetChamados();
       

       
        //renderizando página
        if ($_SESSION['tipo_usuario'] != 1) {

            $this->render('user', 'userLayout');
        } else {
            header('Location: /');
        }

    }

    //render para tela de adição de site no sistema
    public function addDepartamentoPage()
    {
        session_start();       


        $this->render('addDepartamentoPage', 'adminLayout');
    }

    public function show_historico_geral()
    {
        session_start();

        $historico = Container::getModel('Chamado');
        $usuario = Container::getModel('Admin');
    

        $historicoChamados = $historico->userGetAllChamados();
        $usuarioHistorico = $usuario->adminGetUsuario();

        $this->view->historicoChamados = $historicoChamados;
        $this->view->usuarioHistorico = $usuarioHistorico;
       


        if ($_SESSION['tipo_usuario'] != 2) {
            $this->render('historicoGeral', 'adminLayout');
        } else {
            $this->render('historicoGeral', 'userLayout');
        }

    }

    //logica de botçao de volta e home
    public function voltar()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1) {
            header("Location: /admin");
        } else {
            header("Location: /user");
        }

    }

    //render para a tela de configurações do dite de chamados
    public function show_configs()
    {
        session_start();

        $depto = Container::getModel('Chamado');
        $getUsers = Container::getModel('Admin');

        //logica da tabela de usuarios
        $adminGetUsers = $getUsers->adminGetUsuarios();
        $departamentos = $depto->getAlldepartamentos();
        

        $this->view->getAlldepartamentos = $departamentos;
        $this->view->adminGetUsers = $adminGetUsers;

       


        $this->view->adminGetUsers = $adminGetUsers;

        //logica para pegar os valores da tabela de usuarios para um formulario

        $this->render('Show_configs','adminLayout');
    }
}
