<?php

namespace App\Models;

use MF\Model\Model;

class Chamado extends Model
{
    //PK´s
    private $pk_id_usuario;
    private $pk_id_chamado;
    private $pk_id_departamento;

    //FK´s
    private $fk_id_usuario;
    private $fk_id_departamento;

    //dados normais
    private $chamado;
    private $status_chamado;
    private $solucao_chamado;
    

    

    //METODOS GET E SET MAGICOS
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //query para adicionar um chamado
    public function reportChamado()
    {
        $query = "
                INSERT INTO
                        tb_chamados
                        ( 
                            fk_id_usuario,
                            fk_id_departamento,                    
                            chamado,
                            status_chamado,
                            solucao_chamado,
                            situacao_chamado                                      
                        )
                    VALUES
                        (
                            :fk_id_usuario,
                            :fk_id_departamento,                    
                            :chamado, 
                            :status_chamado,
                            :solucao_chamado,
                            1                   
                        );";

        $stmt = $this->db->prepare($query);

        //bindando valores
        $stmt->bindValue('fk_id_usuario', $this->__get('fk_id_usuario'));
        $stmt->bindValue('fk_id_departamento', $this->__get('fk_id_departamento'));
        $stmt->bindValue('chamado', $this->__get('chamado'));
        $stmt->bindValue('status_chamado', $this->__get('status_chamado'));
        $stmt->bindValue('solucao_chamado', $this->__get('solucao_chamado'));
        

        $stmt->execute();
        //data bet e id podem ficar sem insertar pq eles temauto incremento com o horario certo que foi feita a reqiusição
        return $this;
    }

    //query para pegar TODOS os departamentos que tem no sistema
    public function getAllDepartamentosAbertos()
    {
        $query =   "SELECT
                    *
                    FROM
                    tb_departamentos
                    WHERE
                    situacao_departamento = 1;";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    //query para pegar um departamento em especifico
    public function getDepartamentoAberto()
    {
        $query = "SELECT
                    pk_id_departamento,
                    departamento 
                FROM
                    tb_departamentos
                WHERE
                    pk_id_departamento = :pk_id_departamento and situacao_departamento = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('pk_id_departamento',$this->__get('pk_id_departamento'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }       

    //query para pegar todos os chamados ABERTOS de um usuario especifico
    public function getChamadosAbertos()
    {
        $query = 'SELECT
                    pk_id_chamado,
                    DATE_FORMAT(data_chamado,"%d/%m/%Y") as data_chamado,
                    DATE_FORMAT(data_chamado,"%H:%i") as hora_chamado,
                    status_chamado,
                    fk_id_usuario             
                  FROM
                    tb_chamados
                  WHERE
                    fk_id_usuario = :fk_id_usuario
                        and
                    status_chamado = 1
        ';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario',$this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //query para pegar todos os chamados FECHADOS de um usuario especifico
    public function getChamadosFechados()
    {
        $query = 'SELECT
                    pk_id_chamado,
                    DATE_FORMAT(data_chamado,"%d/%m/%Y") as data_chamado,
                    DATE_FORMAT(data_chamado,"%H:%i") as hora_chamado,
                    status_chamado,
                    fk_id_usuario
                  FROM
                    tb_chamados
                  WHERE
                    fk_id_usuario = :fk_id_usuario
                        and
                    status_chamado = 2
        ';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario',$this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
