<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model
{

    private $fk_id_usuario;

   

    //METODOS GET E SET MAGICOS
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

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

}
