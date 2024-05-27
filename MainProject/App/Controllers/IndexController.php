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

            //$getUsers = Container::getModel('Admin');


            //logica da tabela de usuarios
            //$adminGetUsers = $getUsers->adminGetUsuarios();

            //$this->view->adminGetUsers = $adminGetUsers;

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
        $contador = Container::getModel('Bet');

        //logica do contador de apostas que retorna todas as apostas feitas
        $contador->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
        $this->view->contadorApostas = $contador->contadorApostas();

        //logica da tabela que ira exibir todas as apostas
        $this->view->userGetApostas = $contador->userGetApostas();

        //logica para calcular todos os ganhos do usuario
        $this->view->somaGanhos = $contador->usuarioSomaGanhos();  
       
       

        
        
        //renderizando página
        if ($_SESSION['tipo_usuario'] != 1) {           
            
            $this->render('user', 'userLayout');
        } else {
            header('Location: /');
        }
        
        
    }    

    //render para tela de adição de site no sistema
    public function addSitePage()
    {
        session_start();
        $this->render('addSitePage', 'adminLayout');
    }

    public function show_historico_geral()
    {
        session_start();

        if ($_SESSION['tipo_usuario'] != 2) {
            $this->render('historicoGeral','adminLayout');
        } else {
            $this->render('historicoGeral','userLayout');
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
}
