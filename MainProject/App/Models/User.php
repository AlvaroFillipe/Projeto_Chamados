<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model
{
    //FK´s
    private $fk_id_usuario;
    
    //PK´s
    private $pk_id_usuario;
    private $pk_id_chamado;


   

    //METODOS GET E SET MAGICOS
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }


    //qery para pegar todas as informaçoes de um usuario especifico
    public function userGetUsuario()
    {
        $query ='SELECT
                    *
                FROM
                    tb_usuarios

                LEFT JOIN
                    tb_departamentos
                ON
                    (tb_usuarios.fk_id_departamento = tb_departamentos.pk_id_departamento)
                
                WHERE
                    pk_id_usuario = :pk_id_usuario
                    ';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':pk_id_usuario',$this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    //query para pegar aposta chamados mais detalhadamente
    public function userGetChamados()
    {
        $query = 'SELECT
                        pk_id_chamado,
                        fk_id_usuario,
                        fk_id_departamento,
                        chamado,
                        status_chamado,
                        solucao_chamado,
                        DATE_FORMAT(data_chamado,"%d/%m/%Y") as data_chamado,
                        DATE_FORMAT(data_chamado,"%H:%i") as hora_chamado
                    FROM
                        tb_chamados
                    LEFT JOIN
                        tb_departamentos
                    ON
                        (tb_chamados.fk_id_departamento = tb_departamentos.pk_id_departamento)
                    WHERE
                        fk_id_usuario = :fk_id_usuario
                    ORDER BY
                        pk_id_chamado
                    DESC;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

       //query para pegar apenas um chamado de acordo com um usuario especifico
    public function userGetChamado()
    {
        $query = 'SELECT
                        pk_id_chamado,
                        fk_id_usuario,
                        fk_id_departamento,
                        chamado,
                        status_chamado,
                        solucao_chamado,
                        DATE_FORMAT(data_chamado,"%d/%m/%Y") as data_chamado
                    FROM
                        tb_chamados
                    LEFT JOIN
                        tb_departamentos
                    ON
                        (tb_chamados.fk_id_departamento = tb_departamentos.pk_id_departamento)
                    WHERE
                        fk_id_usuario = :fk_id_usuario and pk_id_chamado = :pk_id_chamado;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));
        $stmt->bindValue('pk_id_chamado', $this->__get('pk_id_chamado'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //query para pegar apenas um chamado de acordo com um usuario especifico
    public function userGetAllChamados()
    {
        $query = 'SELECT
                       pk_id_chamado,
                       usuario,
                       departamento, 
                       fk_id_usuario,                       
                       status_chamado,
                       DATE_FORMAT(data_chamado,"%d/%m/%Y") as data_chamado,
                       DATE_FORMAT(data_chamado,"%H:%i") as hora_chamado
                   FROM
                       tb_chamados
                   LEFT JOIN
                       tb_departamentos
                   ON
                       (tb_chamados.fk_id_departamento = tb_departamentos.pk_id_departamento)
                    LEFT JOIN
                       tb_usuarios
                   ON
                       (tb_chamados.fk_id_usuario = tb_usuarios.pk_id_usuario)
                   WHERE
                       pk_id_usuario = :pk_id_usuario
                   ORDER BY
                       data_chamado DESC';
                    
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));
        
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
