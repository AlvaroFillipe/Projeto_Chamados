<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

    protected function initRoutes()
    {
        //ROTAS AdminController   
        $routes['createUser'] = array(
            'route' => '/createUser',
            'controller' => 'AdminController',
            'action' => 'createUser'
        );

        $routes['showProfile'] = array(
            'route' => '/showProfile',
            'controller' => 'SystemController',
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

        

        $routes['delete_departamento'] = array(
            'route' => '/delete_departamento',
            'controller' => 'AdminController',
            'action' => 'delete_departamento'
        );

        $routes['showDepartamento'] = array(
            'route' => '/show_departamento',
            'controller' => 'AdminController',
            'action' => 'showDepartamento'
        );










        //ROTAS ChamadoController

        $routes['adminreportchamado'] = array(
            'route' => '/adminreportchamado',
            'controller' => 'ChamadoController',
            'action' => 'adminreportchamado'
        );   
        

        $routes['reportChamadoPage'] = array(
            'route' => '/reportChamadoPage',
            'controller' => 'ChamadoController',
            'action' => 'reportChamadoPage'
        );   
        
        $routes['adminReportChamadoPage'] = array(
            'route' => '/adminReportChamadoPage',
            'controller' => 'ChamadoController',
            'action' => 'adminReportChamadoPage'
        );   

        $routes['showChamado'] = array(
            'route' => '/showChamado',
            'controller' => 'ChamadoController',
            'action' => 'showChamado'
        );
        
        $routes['deleteChamadoAdmin'] = array(
            'route' => '/deleteChamadoAdmin',
            'controller' => 'ChamadoController',
            'action' => 'deleteChamadoAdmin'
        );

        $routes['responder_chamado'] = array(
            'route' => '/responder_chamado',
            'controller' => 'ChamadoController',
            'action' => 'responder_chamado'
        );

        $routes['reportChamado'] = array(
            'route' => '/reportChamado',
            'controller' => 'ChamadoController',
            'action' => 'reportChamado'
        );








        //ROTAS PARA ConselhoController
        $routes['mainConselho'] = array(
            'route' => '/mainConselho',
            'controller' => 'ConselhoController',
            'action' => 'mainConselho'
        );

        $routes['createFolderConselhoPage'] = array(
            'route' => '/createFolderConselhoPage',
            'controller' => 'ConselhoController',
            'action' => 'createFolderConselhoPage'
        );

        $routes['anexaArquivoConselho'] = array(
            'route' => '/anexaArquivoConselho',
            'controller' => 'ConselhoController',
            'action' => 'anexaArquivoFolderConselhoPage'
        );

        $routes['add_modalidade_arquivo'] = array(
            'route' => '/add_modalidade_arquivo',
            'controller' => 'ConselhoController',
            'action' => 'add_modalidade_arquivo'
        );

        $routes['add_modalidade_evento'] = array(
            'route' => '/add_modalidade_evento',
            'controller' => 'ConselhoController',
            'action' => 'add_modalidade_evento'
        );

        $routes['add_evento_conselho'] = array(
            'route' => '/add_evento_conselho',
            'controller' => 'ConselhoController',
            'action' => 'add_evento_conselho'
        );

        $routes['create_evento_conselho'] = array(
            'route' => '/create_evento_conselho',
            'controller' => 'ConselhoController',
            'action' => 'create_evento_conselho'
        );

        $routes['show_evento_conselho'] = array(
            'route' => '/show_evento_conselho',
            'controller' => 'ConselhoController',
            'action' => 'show_evento_conselho'
        );

        
        









                 


        //ROTAS SystemController 

        $routes['visualizer'] = array(
            'route' => '/visualizer',
            'controller' => 'SystemController',
            'action' => 'visualizer'
        );   
     
        $routes['getUser'] = array(
            'route' => '/getUser',
            'controller' => 'SystemController',
            'action' => 'getUser'
        );   

        $routes['login'] = array(
            'route' => '/',
            'controller' => 'SystemController',
            'action' => 'login'
        );

        $routes['admin'] = array(
            'route' => '/admin',
            'controller' => 'SystemController',
            'action' => 'Admin'
        );

        $routes['user'] = array(
            'route' => '/user',
            'controller' => 'SystemController',
            'action' => 'user'
        );
        
        $routes['show_historico_geral'] = array(
            'route' => '/show_historico_geral',
            'controller' => 'SystemController',
            'action' => 'show_historico_geral'
        );

        $routes['show_configs'] = array(
            'route' => '/Show_configs',
            'controller' => 'AdminController',
            'action' => 'show_configs'
        );

        $routes['adminGetUsuarios'] = array(
            'route' => '/adminGetUsuarios',
            'controller' => 'SystemController',
            'action' => 'adminGetUsuarios'
        );

        $routes['getAllSites'] = array(
            'route' => '/getAllSites',
            'controller' => 'SystemController',
            'action' => 'getAllSites'
        );

        $routes['voltar'] = array(
            'route' => '/voltar',
            'controller' => 'SystemController',
            'action' => 'voltar'
        );

      
        








        //ROTAS AuthController

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar'
        );        

        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
        );





        $this->setRoutes($routes);
    }
}
