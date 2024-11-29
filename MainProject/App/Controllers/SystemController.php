<?php
namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

//nesta classe deveram permanecer todos o controllers de paginas do systema padrao que qualquer usuario possa acessar e funçoes base do systema

class SystemController extends Action
{

    //render para a pagina de login
    public function login()
    { //pagina para ser chamada e em seguida o laypout

        //metodo criado para fazer render do alerta de usuario incorreto, se na url tiver ['login'] ele vai pégar-la e incluir o que estiver nela,caso o contrario ele vai incluir a url vaia [''] = ''
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

        $this->render('login','layout4');
    }

    //render para pagina de admin
    public function admin()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1) {

            $getUsers = Container::getModel('Admin');

            //logica da tabela de usuarios
            $adminGetUsers = $getUsers->adminGetUsuarios();

            $this->view->adminGetUsers = $adminGetUsers;

            //logica para pegar os valores da tabela de usuarios para um formulario

            $this->render('admin', 'layout1');
        }elseif ($_SESSION['tipo_usuario'] == 3) {
            $getUsers = Container::getModel('Admin');

            //logica da tabela de usuarios
            $adminGetUsers = $getUsers->adminGetUsuarios();

            $this->view->adminGetUsers = $adminGetUsers;

            //logica para pegar os valores da tabela de usuarios para um formulario

            $this->render('admin', 'layout2');
        } else {
            header('Location: /');
        }
        
       
    }

    //render para pagina de usuario padrão
    public function user()
    {
        session_start();
        $chamado = Container::getModel('User');
        $usuario = Container::getModel('Admin');

        $chamado->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
        $usuario->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);

        //logica que exibe todas as informações do usuario
        $this->view->adminGetUsuario = $usuario->adminGetUsuario();
        


        //logica da tabela que ira exibir todas as chamados
        $this->view->userGetChamados = $chamado->userGetChamados();
       

       
        //renderizando página
        if ($_SESSION['tipo_usuario'] != 1) {

            $this->render('user', 'layout1');
        } else {
            header('Location: /');
        }

    }

    //logica de botçao de volta e home
    public function voltar()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1 and $_SESSION['tipo_usuario'] == 3) {
            header("Locarion :/admin");
        }elseif($_SESSION['tipo_usuario'] == 2){
            header("Location: /user");
        }else{
            header("Location: / ");
        }
        
       

    }

    public function show_historico_geral()
    {
        session_start();

         
 
        if ($_SESSION['tipo_usuario'] == 1) {
            $historico = Container::getModel('Admin');

            $historico->adminGetAllChamados();

            $this->view->adminGetAllChamados = $historico->adminGetAllChamados();
                  
           
            $this->render('historicoGeral', 'layout1');

        } elseif ($_SESSION['tipo_usuario'] == 2) {
            $historico = Container::getModel('User');


            $historico->__set('pk_id_usuario',$_SESSION['pk_id_usuario']); 

            $this->view->adminGetAllChamados = $historico->userGetAllChamados();

            $this->render('historicoGeral', 'layout1');
        }else {
            header('Location:/');
        }
    }

    //pagina de rebderização de profile de usuario pela pagina de admin
    public function showProfile()
    {
        session_start();
        //se o usuario for admin
        $usuario = Container::getModel('Admin');
        $chamado = Container::getModel('Chamado');

        $usuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $chamado->__set('pk_id_usuario', $_POST['pk_id_usuario']);

        //metodo da parte de editar e visualizar usuario
        $contentUsuario = $usuario->adminGetUsuario();
        $adminGetUsers = $usuario->adminGetUsuarios();

        
        $getAllDepartamentos = $chamado->getAllDepartamentosAbertos();

        //metodo para renderizar os chamados ABERTOS de um usuario especifico
        $getChamadosAbertos = $chamado->getChamadosAbertos();
        
        
        //metodo para renderizar os chamados FECHADOS de um usuario especifico
        $getChamadosFechados = $chamado->getChamadosFechados();
        

        //metodo da parte de editar e visualizar usuario
        $this->view->contentUsuario = $contentUsuario;
       
        $this->view->getAlldepartamentos = $getAllDepartamentos; 
       


        //metodo para admin ver todos os usuarios
        $this->view->adminGetUsers = $adminGetUsers;

        //metodo das tabelas de chamados abertos e fechados
        $this->view->chamadosAbertos = $getChamadosAbertos;
        $this->view->chamadosFechados =  $getChamadosFechados;   

    

        //renderizando pagina
        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('showProfile', 'layout1');
        }elseif($_SESSION['tipo_usuario'] == 3) {
            $this->render('showProfile', 'layout2');
        }elseif($_SESSION['tipo_usuario'] == 2) {
            $this->render('showProfile', 'layout3');
        }
    }
    
}

?>