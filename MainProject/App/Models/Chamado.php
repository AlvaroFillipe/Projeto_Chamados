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
        $query = "INSERT INTO
                tb_chamados
                  ( 
                    fk_id_usuario,
                    fk_id_departamento,                    
                    chamado
                                       
                  )
              VALUES
                  (
                    :fk_id_usuario,
                    :fk_id_departamento,                    
                    :chamado                    
                  );";

        $stmt = $this->db->prepare($query);

        //bindando valores
        $stmt->bindValue('fk_id_usuario', $this->__get('fk_id_usuario'));
        $stmt->bindValue('fk_id_departamento', $this->__get('fk_id_departamento'));
        $stmt->bindValue('chamado', $this->__get('chamado'));
        

        $stmt->execute();
        //data bet e id podem ficar sem insertar pq eles temauto incremento com o horario certo que foi feita a reqiusição
        return $this;
    }

    //query para pegar TODOS os sites que tem no sistema
    public function getAllDepartamentos()
    {
        $query =   "SELECT
                    *
                    FROM
                    tb_departamentos;";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    //query para pegar um departamento em especifico
    public function getDepartamento()
    {
        $query = "SELECT
                    *
                FROM
                    tb_departamentos
                WHERE
                    pk_id_departamento = :pk_id_departamento";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('pk_id_departamento',$this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
    
    //query para pegar aposta detalhada tb_apostas/tb_sites_apostas
    public function userGetChamados()
    {
        $query = 'SELECT
                        *
                    FROM
                        tb_chamados
                    LEFT JOIN
                        tb_departamentos
                    ON
                        (tb_chamados.fk_id_departamento = tb_departamentos.pk_id_departamento)
                    WHERE
                        fk_id_usuario = :fk_id_usuario;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
