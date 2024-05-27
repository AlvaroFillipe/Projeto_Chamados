<?php

namespace MF\Controller;


abstract class Action{
    protected $view;

    public function __construct() {
        $this->view = new \stdClass();
    }

    protected function render($view,$layout = 'layout'){
        
       $this->view->page = $view;


       #fazendo verficação se o arquivo de layout existe, se ele n existir a pagoina vai somente retornar o cinteudo da view
       if (file_exists(require_once "../App/Views/".$layout.".php")) {
            require_once "../App/Views/".$layout.".php";
       } else {
        $this->content();
       }
       
       
    }

    protected function content(){
         //automatizando o render do controller
         $classatual = get_class($this);
         $classatual = str_replace('App\\Controllers\\', '' ,$classatual);
         //colocando tudo em caixa baixa
         $classatual = strtolower(str_replace('Controller', '' ,$classatual));
         
         
         require_once "../App/Views/".$classatual."/".$this->view->page.".php";
    }
}
?>