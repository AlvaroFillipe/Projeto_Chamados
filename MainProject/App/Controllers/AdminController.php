<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

class AdminController extends Action
{
  

    //logica para criação de usuarios
    public function createUser()
    {
        session_start();

        $user = Container::getModel('Admin');

        $_POST['tipo_usuario'] = intval( $_POST['tipo_usuario']);
        $_POST['departamento'] = intval( $_POST['departamento']);

        $user->__set('usuario', $_POST['usuario']);
        $user->__set('senha', md5($_POST['senha']));
        $user->__set('email', $_POST['email']);
        $user->__set('tipo_usuario', $_POST['tipo_usuario']);
        $user->__set('departamento', $_POST['departamento']);

        $user->createUser();

        header('location:/Show_configs');
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

        $contentDepartamento = $chamado->getDepartamento();
        $getAllDepartamentos = $chamado->getAllDepartamentos();

        //metodo para renderizar os chamados ABERTOS de um usuario especifico
        $getChamadosAbertos = $chamado->getChamadosAbertos();
        
        
        //metodo para renderizar os chamados FECHADOS de um usuario especifico
        $getChamadosFechados = $chamado->getChamadosFechados();
        //$contentChamados = $chamado->userGetChamados();

        //metodo da parte de editar e visualizar usuario
        $this->view->contentUsuario = $contentUsuario;
        $this->view->contentDepartamento = $contentDepartamento;
        $this->view->getAlldepartamentos = $getAllDepartamentos; 
       


        //metodo para admin ver todos os usuarios
        $this->view->adminGetUsers = $adminGetUsers;

        //metodo das tabelas de chamados abertos e fechados
        $this->view->chamadosAbertos = $getChamadosAbertos;
        $this->view->chamadosFechados =  $getChamadosFechados;

        //renderizando pagina
        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('showProfile', 'adminLayout');
        }else {
            $this->render('showProfile', 'userLayout');
        }
    }

    //pagina de rebderização de edit de usuario pela pagina de admin
    public function editarPerfil()
    {
        
        session_start();
        $editar = Container::getModel('Admin');        
       
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

        header('Location: /voltar');

    }

    //logica com a função de deletar usuario de acordo com o id fornecido pelo banco
    public function deleteUserAdmin()
    {

        $usuario = Container::getModel('Admin');
        $_POST['pk_id_usuario'] = intval($_POST['pk_id_usuario']);

        $usuario->__set('pk_id_usuario', $_POST['pk_id_usuario']);

        $usuario->deleteUser();

        header('location:/Show_configs');
    }

    //logica para mudar a senha de qualquer usuario
    public function mudarSenhaAdmin()
    {
        session_start();

        //mudando senha
        $senha = Container::getModel('Admin');

        $senha->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $senha->__set('senha', md5($_POST['senha']));

        $senha->mudarSenha();

        header('Location:/voltar');
    }

    //logica para adicionar site
    public function add_departamento()
    {

        $site = Container::getModel('Admin');
        

        $site->__set('departamento', $_POST['departamento']);

        $site->add_departamento();

        header('Location:/Show_configs');

    }

    //logica para deletar um chamado especifico pelo admin
    public function deleteChamadoAdmin()
    {      
        session_start();

        $usuario = Container::getModel('Admin');
        $chamado = Container::getModel('Chamado');

        $usuario->__set('pk_id_chamado', $_POST['pk_id_chamado']);

        $usuario->adminDeletarChamado();   
        
        //se o usuario for admin      

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

        header('Location: /admin');       
    }

    //logica de responder chamado
    public function responder_chamado()
    {
        session_start();        

        $chamado = Container::getModel('Admin');
        $chamado->__set('solucao_chamado',$_POST['solucao_chamado']);
        $chamado->__set('pk_id_chamado',$_POST['pk_id_chamado']);

        $chamado->responder_chamado();

        header('Location:/voltar');

    }

}
