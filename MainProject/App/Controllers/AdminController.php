<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;


class AdminController extends Action
{
    //render para pagina de criar usuarios
    public function createUserPage()
    {
        session_start();
        $this->render("FormCreateUser", "adminLayout");
    }

    //logica para criação de usuarios
    public function createUser()
    {
        session_start();

        $user = Container::getModel('Admin');
        

        $user->__set('usuario', $_POST['usuario']);
        $user->__set('senha', $_POST['senha']);
        $user->__set('email', $_POST['email']);
        $user->__set('tipo_usuario', $_POST['tipo_usuario']);
        $user->__set('categoria_usuario', $_POST['categoria_usuario']);

        $user->createUser();

        header('location:/createUserPage');
    }

    //pagina de rebderização de profile de usuario pela pagina de admin
    public function showProfileAdmin()
    {
        session_start();

        if (empty($usuario)) {

            $contentUsuario = Container::getModel('Admin');
            $contentAposta = Container::getModel('Bet');

            $contentUsuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);           
            $contentAposta->__set('pk_id_usuario', $_POST['pk_id_usuario']);
            
            

            $usuario = $contentUsuario->adminGetUsuario(); 
            $aposta = $contentAposta->userGetApostas();
            
                      
            //metodo da parte de editar e visualizar usuario
            $this->view->contentUsuario = $usuario;
            //metodo da tabela de chamados do usuario solicitado
            $this->view->contentAposta = $aposta;  
            
           
            

        $this->render('showProfileAdmin', 'adminLayout');
        } else {


            $contentUsuario = Container::getModel('Admin');
            $contentAposta = Container::getModel('Bet');

            $contentUsuario->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
            $contentAposta->__set('pk_id_aposta', $_SESSION['pk_id_usuario']);

            $usuario = $contentUsuario->adminGetUsuario();
            $aposta = $contentAposta->userGetApostas();

            $this->view->contentUsuario = $usuario;
            $this->view->contentAposta = $aposta; 

            $this->render('showProfileAdmin', 'adminLayout');
        }
    }

    //pagina de rebderização de edit de usuario pela pagina de admin
    public function editarPerfil()
    {
        session_start();
        $editar = Container::getModel('Admin');

        $editar->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $editar->__set('usuario', $_POST['usuario']);
        $editar->__set('email', $_POST['email']);
        $editar->__set('tipo_usuario', $_POST['tipo_usuario']);
        $editar->__set('categoria_usuario', $_POST['categoria_usuario']);
        
       

        $editar->editarUsuario();


        //redirecionando pra tela de profile denovo        
        $usuario = $editar->adminGetUsuario();

        $this->view->contentUsuario = $usuario;        

        $this->render('showProfileAdmin', 'adminLayout');
    }

    //logica com a função de deletar usuario de acordo com o id fornecido pelo banco
    public function deleteUserAdmin()
    {


        $usuario = Container::getModel('Admin');
        $_POST['pk_id_usuario'] = intval($_POST['pk_id_usuario']);

       
        $usuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);
       
        $usuario->deleteUser();

        header('location:/admin');
    }

    //logica para mudar a senha de qualquer usuario
    public function mudarSenhaAdmin()
    {
        session_start();

        //mudando senha
        $senha = Container::getModel('Admin');

        $senha->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $senha->__set('senha', $_POST['senha']);

        $senha->mudarSenha();



        //redirecionando pra tela de profile denovo        
        $usuario = $senha->adminGetUsuario();

        $this->view->contentUsuario = $usuario;        

        $this->render('showProfileAdmin', 'adminLayout');
    }

    //logica para adicionar site
    public function add_departamento()
    {
        session_start();
        echo '<pre>';
        print_r($_POST);        
        echo'</pre>';
        
        $site = Container::getModel('Admin');

       
        $site->__set('departamento',$_POST['departamento']);
        
        $site->addSite();

        header('Location:/addSitePage');
        
        

    }

}
