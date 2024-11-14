<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

class AdminController extends Action
{   
    //pagina de renderizaçao show_departamento
    public function showDepartamento()
    {
        session_start();
        

        $departamento = Container::getModel('Chamado');

        $departamento->__set('pk_id_departamento',$_POST['pk_id_departamento']);
        $getDepartamento = $departamento->getDepartamentoAberto();
        $getDepartamentos = $departamento->getAllDepartamentosAbertos();

        $this->view->GetDepartamento = $getDepartamento;
        $this->view->GetDepartamentos = $getDepartamentos;

       

        echo "<pre>";
        print_r($this->view->GetDepartamento);
        echo"</pre>";

        
        echo "<pre>";
        print_r($this->view->GetDepartamentos);
        echo"</pre>";




        //$this->render('show_departamento','adminLayout');
    }    

    //pagina de rebderização de edit de usuario pela pagina de admin
    public function editarPerfil()
    {
        if (isset($_SESSION)) {
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
        header('Location: /sair');
    }

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

        $site->addDepartamento();

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

    //logica para deletar departamento
    public function deleteDepartamento()
    {
        session_start();
        print_r($_POST);
        //chamando Model
        $usuario = Container::getModel('Admin');

        //setando o que estiver em post na variavel get para mandar para o banco
        
        $usuario->__set('pk_id_departamento',$_POST['pk_id_departamento']);

        //chamando função do model
        $usuario->delete_departamento();

        header('Location: /Show_configs'); 

        
    }
    
    //render para tela de adição de site no sistema
    public function addDepartamentoPage()
    {
        session_start();       


        $this->render('addDepartamentoPage', 'adminLayout');
    }    

    //render para a tela de configurações do dite de chamados
    public function show_configs()
    {
        session_start();

        $depto = Container::getModel('Chamado');
        $getUsers = Container::getModel('Admin');

        //logica da tabela de usuarios
        $adminGetUsers = $getUsers->adminGetUsuarios();
        $departamentos = $depto->getAlldepartamentosAbertos();
        

        $this->view->getAlldepartamentos = $departamentos;
        $this->view->adminGetUsers = $adminGetUsers;

       


        $this->view->adminGetUsers = $adminGetUsers;

        //logica para pegar os valores da tabela de usuarios para um formulario

        $this->render('Show_configs','adminLayout');
    }
}
