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

    //query para retornar um array de todas as categorias de tipos de eventos ativos do conselho

    public function getEventosAtivos()
    {
        $query =  " SELECT 
                        pk_id_modalidade_evento, 
                        modalidade_evento 
                    FROM 
                        tb_modalidade_evento 
                    WHERE 
                        situacao_modalidade = 1;";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
    }

    //query para fazer inserção de pasta de evento do conselho no sistema
    public function add_evento_conselho()
    {
        $query = "INSERT INTO
                    tb_evento_conselho(
                            caminho_pasta,
                            nome_evento,
                            data_evento,
                            tag_evento,
                            situacao_evento,
                            fk_id_modalidade_evento
                    )VALUES(
                            :caminho_pasta,
                            :nome_evento,
                            :data_evento,
                            :tag_evento,
                            1,
                            :modalidade_evento
                    );";
        
        $stmt = $this->db->prepare($query);

        $stmt->bindValue('caminho_pasta',$this->__get('caminho_pasta'));
        $stmt->bindValue('nome_evento',$this->__get('nome_evento'));
        $stmt->bindValue('data_evento',$this->__get('data_evento'));
        $stmt->bindValue('tag_evento',$this->__get('tag_evento'));
        $stmt->bindValue('modalidade_evento',$this->__get('modalidade_evento'));
        
        $stmt->execute();
        return $this;
    
    }





    




}
