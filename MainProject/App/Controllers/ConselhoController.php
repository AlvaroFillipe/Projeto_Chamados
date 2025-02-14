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

        $evento = Container::getModel('Conselho');
        $getEventosAtibos = $evento->getEventosAtivos();
        $this->view->getEventosAtivos = $getEventosAtibos;


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
        $conselho = Container::getModel('Conselho');

        $get_eventos_ativos = $conselho->getModalidadeEventosAtivos();

        $this->view->getEventosAtivos = $get_eventos_ativos;

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

    //logica para adicionar uma modalidade de evento no conselho
    public function add_modalidade_evento()
    {
        $evento = Container::getModel('Conselho');
        

        $evento->__set('modalidade_evento', $_POST['modalidade_evento']);

        $evento->add_modalidade_evento();

        header('Location:/Show_configs');
    }

    //logica para adicionar uma modalidade de arquivo no conselho
    public function add_modalidade_arquivo()
    {
        $evento = Container::getModel('Conselho');
        

        $evento->__set('modalidade_arquivo', $_POST['modalidade_arquivo']);

        $evento->add_modalidade_arquivo();

        header('Location:/Show_configs');
    }

    //logica para adicionar um evento no conselho
    public function create_evento_conselho()
    {
        session_start();


        
        $pasta = $_POST['nome_evento'];

        $caminho_pasta = "\\\as010\Conselho\pasta_eventos_conselho_2024\\".$pasta ;
        
        
        if (!file_exists($caminho_pasta)) {//verificando se pasta ja existe
            if (mkdir($caminho_pasta, 0777, true)) {//criando pasta
                $evento = Container::getModel('Conselho');

                $evento->__set('caminho_pasta', $caminho_pasta);
                $evento->__set('nome_evento',$_POST['nome_evento']);
                $evento->__set('data_evento',$_POST['data_evento']);
                $evento->__set('tag_evento',$_POST['tag_evento']);
                $evento->__set('modalidade_evento',$_POST['modalidade_evento']);

                $evento->add_evento_conselho();

                header('Location: /createFolderConselhoPage');

            } else {
                echo "nao foi possivel criar a pasta";
            }
            
        } else {
           echo "a pasta ja existe";
        }
    


    }

    //render para pagina show_evento_conselho 
    public function show_evento_conselho()
    {
        
        session_start();

        $evento = Container::getModel('Conselho');
        $evento->__set('pk_id_evento', $_POST['pk_id_evento']);

        $getEventoAtivo = $evento->getEventoAtivo();
        $this->view->getEventoAtivo = $getEventoAtivo;

        $getmodalidadeArquivoAtiva = $evento->getModalidadeArquivoAtiva();
        $this->view->getModaliadesArquivosAtivas = $getmodalidadeArquivoAtiva;


        if ($_SESSION['tipo_usuario'] == 1) {
            $this->render('show_evento_conselho','adminLayout');
        } else {
            $this->render('show_evento_conselho','userLayout');
        }
        
    }

    
}
