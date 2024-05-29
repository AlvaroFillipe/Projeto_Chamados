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

        $depto = Container::getModel('Chamado');
        $departamentos = $depto->getAlldepartamentos();

        $this->view->getAlldepartamentos = $departamentos;

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
        $user->__set('departamento', $_POST['departamento']);

        $user->createUser();

        header('location:/createUserPage');
    }

    //pagina de rebderização de profile de usuario pela pagina de admin
    public function showProfileAdmin()
    {
        session_start();
        //se o usuario for admin
        $usuario = Container::getModel('Admin');
        $chamado = Container::getModel('Chamado');

        $usuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $chamado->__set('pk_id_usuario', $_POST['pk_id_usuario']);

        //metodo da parte de editar e visualizar usuario
        $contentUsuario = $usuario->adminGetUsuario();
        $contentDepartamento = $chamado->getDepartamento();
        $getAllDepartamentos = $chamado->getAllDepartamentos();

        //metodo para renderizar os chamados de um usuario especifico
        $contentChamados = $chamado->userGetChamados();

        //metodo da parte de editar e visualizar usuario
        $this->view->contentUsuario = $contentUsuario;
        $this->view->contentDepartamento = $contentDepartamento;
        $this->view->getAlldepartamentos = $getAllDepartamentos;

        //metodo para renderizar os chamados de um usuario especifico
        $this->view->contentChamados = $contentChamados;
        

        $this->render('showProfileAdmin', 'adminLayout');

    }

    //pagina de rebderização de edit de usuario pela pagina de admin
    public function editarPerfil()
    {
        session_start();
        $editar = Container::getModel('Admin');
        $chamado = Container::getModel('Chamado');
       
        //passado os valores necessarios para int
        $_POST['pk_id_usuario'] = intval($_POST['pk_id_usuario']);
        $_POST['tipo_usuario'] = intval($_POST['tipo_usuario']);
        $_POST['departamento'] = intval($_POST['departamento']);

        $editar->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $editar->__set('usuario', $_POST['usuario']);
        $editar->__set('email', $_POST['email']);
        $editar->__set('tipo_usuario', $_POST['tipo_usuario']);
        $editar->__set('departamento', $_POST['departamento']);

        $editar->editarUsuario();
        
        //redirecionando pra tela de profile denovo
        //se o usuario for admin        

        $editar->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $chamado->__set('pk_id_usuario', $_POST['pk_id_usuario']);

        //metodo da parte de editar e visualizar usuario
        $contentUsuario = $editar->adminGetUsuario();
        $contentDepartamento = $chamado->getDepartamento();
        $getAllDepartamentos = $chamado->getAllDepartamentos();

        //metodo para renderizar os chamados de um usuario especifico
        $contentChamados = $chamado->userGetChamados();

        //metodo da parte de editar e visualizar usuario
        $this->view->contentUsuario = $contentUsuario;
        $this->view->contentDepartamento = $contentDepartamento;
        $this->view->getAlldepartamentos = $getAllDepartamentos;

        //metodo para renderizar os chamados de um usuario especifico
        $this->view->contentChamados = $contentChamados;

        
        
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
        $usuario = Container::getModel('Admin');
        $chamado = Container::getModel('Chamado');

        $usuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $chamado->__set('pk_id_usuario', $_POST['pk_id_usuario']);

        //metodo da parte de editar e visualizar usuario
        $contentUsuario = $usuario->adminGetUsuario();
        $contentDepartamento = $chamado->getDepartamento();
        $getAllDepartamentos = $chamado->getAllDepartamentos();

        //metodo para renderizar os chamados de um usuario especifico
        $contentChamados = $chamado->userGetChamados();

        //metodo da parte de editar e visualizar usuario
        $this->view->contentUsuario = $contentUsuario;
        $this->view->contentDepartamento = $contentDepartamento;
        $this->view->getAlldepartamentos = $getAllDepartamentos;

        //metodo para renderizar os chamados de um usuario especifico
        $this->view->contentChamados = $contentChamados;

        $this->render('showProfileAdmin', 'adminLayout');
    }

    //logica para adicionar site
    public function add_departamento()
    {

        $site = Container::getModel('Admin');

        $site->__set('departamento', $_POST['departamento']);

        $site->addSite();

        header('Location:/addDepartamentoPage');

    }

}
