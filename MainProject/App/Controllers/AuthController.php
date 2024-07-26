<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;


class AuthController extends Action
{
    public function autenticar()
    {

        //instanciando classe 

        $autenticar = Container::getModel('Admin');


        //setando inputs
        $autenticar->__set('usuario', $_POST['usuario']);
        $autenticar->__set('senha', $_POST['senha']);
        //$autenticar->__set('senha', md5($_POST['senha']));  

        echo '<pre>';
        print_r($_POST);
        echo'</pre>';
        
        //executando funções
        $autenticar->autenticar();

        //fazendo verificação se tem alguma coisa no retorno de autenticar();
        if ($autenticar->__get('pk_id_usuario') != '' and  $autenticar->__get('usuario') != '') {

            //fazendo verificação se o usuario é admin ou usuario normal

            // 1 = ADMIN
            // 2 = USUARIO COMUM  
            if ($autenticar->__get('tipo_usuario') != 2) {
                //iniciando sessão para guardar dados do usuario emquanto ele estiver logado
                session_start();

                //guarddndo dados do usuario
                $_SESSION['pk_id_usuario'] = $autenticar->__get('pk_id_usuario');
                $_SESSION['usuario'] = $autenticar->__get('usuario');
                $_SESSION['tipo_usuario'] = $autenticar->__get('tipo_usuario');


                //redirecionando usuario para sua timeline especifica
                header('Location: /admin');
            } elseif ($autenticar->__get('tipo_usuario') != 1) {
                //iniciando sessão para guardar dados do usuario emquanto ele estiver logado
                session_start();

                //guarddndo dados do usuario
                $_SESSION['pk_id_usuario'] = $autenticar->__get('pk_id_usuario');
                $_SESSION['usuario'] = $autenticar->__get('usuario');
                $_SESSION['tipo_usuario'] = $autenticar->__get('tipo_usuario');

                //redirecionando usuario para sua timeline especifica
                header('Location: /user');
            }
        } else {
            //usando função nativa do php para redirecionar o usuario para a tela de login se ele não colocar um usuario e senha corretos
            header('Location: /?login=erro'); //somente a barra retorna ele para a pagina raiz de login
        }
        
    }

    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
