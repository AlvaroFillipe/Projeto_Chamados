<?php

namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;


class ConselhoController extends Action
{
    //render para pagina do conselho principal
    public function mainConselho()
    {
        session_start();

        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('mainConselho','adminLayout');
        } else {
            $this->render('mainConselho','userLayout');
        }
        
        
    }
}
