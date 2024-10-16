<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

    protected function initRoutes()
    {
        //ROTAS DE RENDERIZAÇÃO DE PAGINAS PRINCIPAIS     
        $routes['login'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'login'
        );

        $routes['admin'] = array(
            'route' => '/admin',
            'controller' => 'IndexController',
            'action' => 'Admin'
        );

        $routes['user'] = array(
            'route' => '/user',
            'controller' => 'IndexController',
            'action' => 'user'
        );

        $routes['reportChamadoPage'] = array(
            'route' => '/reportChamadoPage',
            'controller' => 'UserController',
            'action' => 'reportChamadoPage'
        );     

        $routes['showChamado'] = array(
            'route' => '/showChamado',
            'controller' => 'UserController',
            'action' => 'showChamado'
        );

        $routes['deleteAposta'] = array(
            'route' => '/deleteAposta',
            'controller' => 'UserController',
            'action' => 'deleteAposta'
        );
        
        $routes['show_historico_geral'] = array(
            'route' => '/show_historico_geral',
            'controller' => 'IndexController',
            'action' => 'show_historico_geral'
        );

        $routes['show_configs'] = array(
            'route' => '/Show_configs',
            'controller' => 'IndexController',
            'action' => 'show_configs'
        );












        //ROTAS DE ADMIN
        $routes['adminGetUsuarios'] = array(
            'route' => '/adminGetUsuarios',
            'controller' => 'IndexController',
            'action' => 'adminGetUsuarios'
        );

        $routes['createUser'] = array(
            'route' => '/createUser',
            'controller' => 'AdminController',
            'action' => 'createUser'
        );

        $routes['showProfile'] = array(
            'route' => '/showProfile',
            'controller' => 'AdminController',
            'action' => 'showProfile'
        );

        $routes['editarPerfil'] = array(
            'route' => '/editarPerfil',
            'controller' => 'AdminController',
            'action' => 'editarPerfil'
        );

        $routes['deleteUserAdmin'] = array(
            'route' => '/deleteUserAdmin',
            'controller' => 'AdminController',
            'action' => 'deleteUserAdmin'
        );

        $routes['mudarSenhaAdmin'] = array(
            'route' => '/mudarSenhaAdmin',
            'controller' => 'AdminController',
            'action' => 'mudarSenhaAdmin'
        );

        $routes['add_departamento'] = array(
            'route' => '/add_departamento',
            'controller' => 'AdminController',
            'action' => 'add_departamento'
        );

        $routes['deleteChamadoAdmin'] = array(
            'route' => '/deleteChamadoAdmin',
            'controller' => 'AdminController',
            'action' => 'deleteChamadoAdmin'
        );

        $routes['responder_chamado'] = array(
            'route' => '/responder_chamado',
            'controller' => 'AdminController',
            'action' => 'responder_chamado'
        );

        $routes['delete_departamento'] = array(
            'route' => '/delete_departamento',
            'controller' => 'AdminController',
            'action' => 'delete_departamento'
        );



        












        //ROTAS DE USUARIO
        $routes['getUser'] = array(
            'route' => '/getUser',
            'controller' => 'UserController',
            'action' => 'getUser'
        );

        $routes['reportChamado'] = array(
            'route' => '/reportChamado',
            'controller' => 'UserController',
            'action' => 'reportChamado'
        );

        $routes['getAllSites'] = array(
            'route' => '/getAllSites',
            'controller' => 'IndexController',
            'action' => 'getAllSites'
        );

        $routes['edit_aposta'] = array(
            'route' => '/edit_aposta',
            'controller' => 'UserController',
            'action' => 'edit_aposta'
        );


        
        









        

        //ROTAS DE AUTENTICAÇÃO DE LOGIN
        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar'
        );









        

        //ROTAS DE SAIR DA CONTA
        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
        );

        //ROTA DE BOTÃO DE VOLTAR E HOME

        $routes['voltar'] = array(
            'route' => '/voltar',
            'controller' => 'IndexController',
            'action' => 'voltar'
        );



        //ROTAS DE BET

       





        $this->setRoutes($routes);
    }
}
