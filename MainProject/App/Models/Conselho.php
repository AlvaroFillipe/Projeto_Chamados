<?php

namespace App\Models;

use MF\Model\Model;

class Conselho extends Model
{
    //PK´s

    //VARIAVEIS NORMAIS
    private $modalidade_arquivo;
    private $modalidade_evento;



    //METODOS GET E SET MAGICOS
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }


    //query para fazer insert de modalidade de evetos na tabela do conselho
    public function add_modalidade_evento()
    {
        $query =  "INSERT INTO                        
                        tb_modalidade_evento
                        (
                            modalidade_evento,
                            situacao_evento
                        )
                    VALUES
                        (
                            :modalidade_evento,
                            1
                        )";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':modalidade_evento', $this->__get('modalidade_evento'));
        $stmt->execute();

        return $this;
    }

    //query para fazer insert de modalidade de arquivos na tabela do conselho
    public function add_modalidade_arquivo()
    {
        $query =  "INSERT INTO                        
                        tb_modalidade_arquivos
                        (
                            modalidade_arquivo,
                            situacao_modalidade
                        )
                    VALUES
                        (
                            :modalidade_arquivo,
                            1
                        )";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':modalidade_arquivo', $this->__get('modalidade_arquivo'));
        $stmt->execute();

        return $this;
    }

    




}
