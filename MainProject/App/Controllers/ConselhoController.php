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

    //render para a pagina de geristrar um evento no conselho
    public function createEventConselho()
    {
        session_start();

        
        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('createEventoConselho','adminLayout');
        } else {
            $this->render('createEventoConselho','userLayout');
        }
    }

    //render para pagina de registrar um arquivo em uma pasta especifica(evento) no conselho
    public function anexaArquivoFolderConselhoPage()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('anexaArquivoConselho','adminLayout');
        } else {
            $this->render('anexaArquivoConselho','userLayout');
        }
    }

    //logica para a ação de criar um evento(pasta de evento no sistema)
    public function createFolderConselhoPage()
    {
        session_start();
        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('createEventoConselho','adminLayout');
        } else {
            $this->render('createEventoConselho','userLayout');
        }


    }

    //logica para a ação de anexar um arquivo em um evento(pasta) feito e colocado no banco de dados
    public function anexaArquivoFolderConselho()
    {




        $direotorioDestino =  "C:\arquivos_alvaro\projetos\Projeto_Chamados\teste";
        $arquivoDestino = $direotorioDestino.basename($_FILES["arquivo"]["name"]);
        $uploadOK = 1;

        //verificando se o arquivo de destino ja existe
        if (file_exists($arquivoDestino)) {
            echo "o arquivo ja existe";
            $uploadOK = 0;
        }

        //movendo arquivo para pasta ja criada
        if ($uploadOK == 1) {
            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"],$arquivoDestino)) {
                echo "o arquivo".htmlspecialchars(basename($_FILES["arquivo"]["name"]))." foi movido com sucesso";
            } else {
                echo "erro ao enviar aquivo";
            }
            
        }

    }
}
