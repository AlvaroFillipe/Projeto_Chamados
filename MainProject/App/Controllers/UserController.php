<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

class UserController extends Action
{
    //render para pagina /reportBet
    public function reportBet()
    {
        session_start();

        $bet = Container::getModel('Bet');

        $_POST['resultado_aposta'] = $_POST['retorno_aposta'] - $_POST['valor_aposta'];



        //passando os valores dos inputs para seus devidos tipos certos
        $_POST['pk_id_usuario'] = intval($_POST['pk_id_usuario']);
        $_POST['pk_id_site_aposta'] = intval($_POST['pk_id_site_aposta']);
        $_POST['valor_aposta'] = floatval($_POST['valor_aposta']);
        $_POST['retorno_aposta'] = floatval($_POST['retorno_aposta']);
        $_POST['resultado_aposta'] = floatval($_POST['resultado_aposta']);


        //setando os valores
        $bet->__set('pk_id_usuario', $_POST['pk_id_usuario']);
        $bet->__set('pk_id_site_aposta', $_POST['pk_id_site_aposta']);
        $bet->__set('data_aposta', $_POST['data_aposta']);
        $bet->__set('valor_aposta', $_POST['valor_aposta']);
        $bet->__set('retorno_aposta', $_POST['retorno_aposta']);
        $bet->__set('resultado_aposta', $_POST['resultado_aposta']);
        $bet->__set('id_aposta', $_POST['id_aposta']);        

        $bet->reportBet();

        header('Location: /reportBetPage');
    }

    //render para pagina /showAposta
    public function showAposta()
    {
        session_start();

           

            if (isset($_POST['fk_id_usuario'])){//verificando se há post

                //se houver post...

                if ($_SESSION['tipo_usuario'] != 2) {
                    $aposta = Container::getModel('Bet');
        
                    $aposta->__set('pk_id_usuario', $_POST['fk_id_usuario']);
        
                    //pegando informações da  aposta
                    $this->view->usuarioGetApostas = $aposta->userGetApostas();
        
                    //pegando informalções dos sites para seleciona-los
                    $this->view->getAllsites = $aposta->getAllsites();
                   
        
                    $this->render('showAposta', 'AdminLayout');
                } else {
        
                    $aposta = Container::getModel('Bet');
        
                    $aposta->__set('pk_id_usuario', $_POST['fk_id_usuario']);
        
                    //pegando informações da  aposta
                    $this->view->usuarioGetApostas = $aposta->userGetApostas();
        
                    //pegando informalções dos sites para seleciona-los
                    $this->view->getAllsites = $aposta->getAllsites();
                  
        
                    $this->render('showAposta', 'userLayout');
                }

               
            }else{
                 //se não houver post....
                if ($_SESSION['tipo_usuario'] != 2) {
                    $aposta = Container::getModel('Bet');
        
                    $aposta->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
        
                    //pegando informações da  aposta
                    $this->view->usuarioGetApostas = $aposta->userGetApostas();
        
                    //pegando informalções dos sites para seleciona-los
                    $this->view->getAllsites = $aposta->getAllsites();
                   
        
                    $this->render('showAposta', 'adminLayout');
                } else {
        
                    $aposta = Container::getModel('Bet');
        
                    $aposta->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);
        
                    //pegando informações da  aposta
                    $this->view->usuarioGetApostas = $aposta->userGetApostas();
        
                    //pegando informalções dos sites para seleciona-los
                    $this->view->getAllsites = $aposta->getAllsites();
                  
        
                    $this->render('showAposta', 'userLayout');
                }
            }
        
    }

    //render para pagina de registrar bet
    public function reportBetPage()
    {
        session_start();

        $sites = Container::getModel('Bet');

        $getAllSites = $sites->getAllSites();

        $this->view->getAllsites = $getAllSites;

        if ($_SESSION['tipo_usuario'] != 2) {
            $this->render('reportBetPage', 'adminLayout');
        } else {
            $this->render('reportBetPage', 'userLayout');
        }
    }

    //logica para editar aposta
    public function edit_aposta()
    {
        session_start();

        if ($_SESSION['tipo_usuario'] != 2) {  
            
            
            
            $aposta = Container::getModel('Bet');
            //expressão que tira o resultado da aposta
            $_POST['resultado_aposta'] = $_POST['retorno_aposta'] - $_POST['valor_apostado'];

            $_POST['pk_id_site_aposta'] = intval($_POST['pk_id_site_aposta']);
            $_SESSION['pk_id_usuario'] = intval($_SESSION['pk_id_usuario']);
            $_POST['valor_apostado'] = floatval($_POST['valor_apostado']);
            $_POST['resultado_aposta'] = floatval($_POST['resultado_aposta']);
            $_POST['retorno_aposta'] = floatval($_POST['retorno_aposta']);



            $aposta->__set('fk_site_aposta', $_POST['pk_id_site_aposta']);
            $aposta->__set('data_bet', $_POST['data_bet']);
            $aposta->__set('value_bet', $_POST['valor_apostado']);
            $aposta->__set('value_recept', $_POST['retorno_aposta']);
            $aposta->__set('id_bet', $_POST['id_aposta']);
            $aposta->__set('resultado_aposta', $_POST['resultado_aposta']);
            $aposta->__set('fk_id_usuario', $_POST['fk_id_usuario']);
            $aposta->__set('pk_id_aposta', $_POST['pk_id_aposta']);


            $aposta->editAposta();

            $aposta->__set('pk_id_usuario', $_POST['fk_id_usuario']);

            //pegando informações da  aposta
            $this->view->usuarioGetApostas = $aposta->userGetApostas();

            //pegando informalções dos sites para seleciona-los
            $this->view->getAllsites = $aposta->getAllsites();
           

            $this->render('showAposta', 'adminLayout');
            
            
        } else {

            
            $aposta = Container::getModel('Bet');
            //expressão que tira o resultado da aposta
            $_POST['resultado_aposta'] = $_POST['retorno_aposta'] - $_POST['valor_apostado'];

            $_POST['pk_id_site_aposta'] = intval($_POST['pk_id_site_aposta']);
            $_SESSION['pk_id_usuario'] = intval($_SESSION['pk_id_usuario']);
            $_POST['valor_apostado'] = floatval($_POST['valor_apostado']);
            $_POST['resultado_aposta'] = floatval($_POST['resultado_aposta']);
            $_POST['retorno_aposta'] = floatval($_POST['retorno_aposta']);



            $aposta->__set('fk_site_aposta', $_POST['pk_id_site_aposta']);
            $aposta->__set('data_bet', $_POST['data_bet']);
            $aposta->__set('value_bet', $_POST['valor_apostado']);
            $aposta->__set('value_recept', $_POST['retorno_aposta']);
            $aposta->__set('id_bet', $_POST['id_aposta']);
            $aposta->__set('resultado_aposta', $_POST['resultado_aposta']);
            $aposta->__set('fk_id_usuario', $_POST['fk_id_usuario']);
            $aposta->__set('pk_id_aposta', $_POST['pk_id_aposta']);


            $aposta->editAposta();

            $aposta->__set('pk_id_usuario', $_SESSION['pk_id_usuario']);

            //pegando informações da  aposta
            $this->view->usuarioGetApostas = $aposta->userGetApostas();

            //pegando informalções dos sites para seleciona-los
            $this->view->getAllsites = $aposta->getAllsites();
          

            $this->render('showAposta', 'userLayout');
        }
    }
}
