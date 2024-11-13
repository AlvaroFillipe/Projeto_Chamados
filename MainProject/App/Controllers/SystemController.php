<?php
namespace App\Controllers;

//recursos do sistema
use MF\Controller\Action;
use MF\Model\Container;

//nesta classe deveram permanecer todos o controllers de paginas do systema padrao que qualquer usuario possa acessar e funçoes base do systema

class SystemController extends Action
{
    //logica de botçao de volta e home
    public function voltar()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1) {
            header("Location: /admin");
        } else {
            header("Location: /user");
        }

    }
}

?>