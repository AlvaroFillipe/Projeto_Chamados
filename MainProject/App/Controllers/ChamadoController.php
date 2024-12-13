<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;


class ChamadoController extends Action
{
     //logica para abrir um chamado
     public function reportChamado()
     {
         session_start();
 
         $chamado = Container::getModel('Chamado');
 
         //passando valores para inteiros
         $_POST['pk_id_usuario'] = intval($_POST['pk_id_usuario']);
         $_POST['fk_id_departamento'] = intval($_POST['fk_id_departamento']);
         $_POST['status_chamado'] = intval($_POST['status_chamado']);
 
         //setando os valores
         $chamado->__set('fk_id_usuario', $_POST['pk_id_usuario']);
         $chamado->__set('fk_id_departamento', $_POST['fk_id_departamento']);
         $chamado->__set('chamado', $_POST['chamado']);
         $chamado->__set('status_chamado', $_POST['status_chamado']);
         $chamado->__set('solucao_chamado', $_POST['solucao_chamado']);
 
         $chamado->reportChamado();
 
         header('Location: /reportChamadoPage');
     }
 
     //render para pagina de abrir chamado
     public function reportChamadoPage()
     {
         session_start();
 
         $usuario = Container::getModel('Admin');
 
         $usuario->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
 
         $getUsuario = $usuario->adminGetUsuario();
 
         $this->view->adminGetUsuario = $getUsuario;
 
         if ($_SESSION['tipo_usuario'] == 1 OR $_SESSION['tipo_usuario'] == 3 ) {
             $this->render('reportChamadoPage', 'adminLayout');
         } else {
             $this->render('reportChamadoPage', 'userLayout');
         }
     }
 
     //render para pagina /showAposta
     public function showChamado()
     {
         session_start();
         if ($_SESSION['tipo_usuario'] == 1 OR $_SESSION['tipo_usuario'] == 3) {           
             
             $usuario = Container::getModel('User');
 
            
             $usuario->__set('pk_id_chamado', $_POST['pk_id_chamado']);
             $usuario->__set('pk_id_usuario', $_POST['fk_id_usuario']);
             
             //pegando informações da  chamado
             $this->view->usuarioGetChamado = $usuario->userGetChamado();
 
             //pegando informações do  usuario
             $this->view->usuarioGetUsuario = $usuario->userGetUsuario();       
             
 
             
             $this->render('showChamado', 'adminLayout');
         } else {
 
             
             $usuario = Container::getModel('User');
            
             $usuario->__set('pk_id_chamado', $_POST['pk_id_chamado']);
             $usuario->__set('pk_id_usuario', $_POST['fk_id_usuario']);
             
             //pegando informações da  chamado
             $this->view->usuarioGetChamado = $usuario->userGetChamado();
 
             //pegando informações do  usuario
             $this->view->usuarioGetUsuario = $usuario->userGetUsuario();
                         
             $this->render('showChamado', 'userLayout');
         }
 
     }  

     //logica de responder chamado
    public function responder_chamado()
    {
        session_start();        

        $chamado = Container::getModel('Admin');
        $chamado->__set('solucao_chamado',$_POST['solucao_chamado']);
        $chamado->__set('pk_id_chamado',$_POST['pk_id_chamado']);

        $chamado->responderChamado();

        header('Location:/voltar');

    }
}
