<?php

namespace App\Models;

use MF\Model\Model;

class Bet extends Model
{
    //PK´s
    private $pk_id_usuario;
    private $pk_id_site_aposta;
    private $pk_id_aposta;

    //FK´s
    private $fk_id_usuario;
    private $fk_site_aposta;

    //dados normais
    private $data_aposta;
    private $data_report;
    private $valor_aposta;
    private $retorno_aposta;
    private $site_bet;
    private $resultado_aposta;

    //METODOS GET E SET MAGICOS
    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //query para adicionar uma bet
    public function reportBet()
    {
        $query = "INSERT INTO
                tb_apostas
                  (
                    fk_id_usuario,
                    fk_site_aposta,
                    data_bet,
                    value_bet,
                    value_recept,
                    id_bet,
                    resultado_aposta
                  )
              VALUES
                  (
                    :fk_id_usuario,
                    :fk_site_aposta,
                    :data_bet,
                    :valor_aposta,
                    :retorno_aposta,
                    :id_aposta,
                    :resultado_aposta
                  );";

        $stmt = $this->db->prepare($query);

        //bindando valores
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));
        $stmt->bindValue('fk_site_aposta', $this->__get('pk_id_site_aposta'));
        $stmt->bindValue('data_bet', $this->__get('data_aposta'));
        $stmt->bindValue('valor_aposta', $this->__get('valor_aposta'));
        $stmt->bindValue('retorno_aposta', $this->__get('retorno_aposta'));
        $stmt->bindValue('id_aposta', $this->__get('id_aposta'));
        $stmt->bindValue('resultado_aposta', $this->__get('resultado_aposta'));

        $stmt->execute();
        //data bet e id podem ficar sem insertar pq eles temauto incremento com o horario certo que foi feita a reqiusição
        return $this;
    }

    //query para pegar TODOS os sites que tem no sistema
    public function getAllSites()
    {
        $query = "SELECT
                  *
              FROM
                  tb_sites_apostas";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //que   ry para o contador de apostas feitas pelo usuario
    public function contadorApostas()
    {
        $query = 'SELECT
                COUNT(*) as apostas_feitas
              FROM
                tb_apostas
              WHERE
              fk_id_usuario = :fk_id_usuario';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //return $this;
    }
    
    //query para pegar aposta detalhada tb_apostas/tb_sites_apostas
    public function userGetApostas()
    {
        $query = 'SELECT
                  *
              FROM
                  tb_apostas
              LEFT JOIN
                  tb_sites_apostas
              ON
                  (tb_apostas.fk_site_aposta = tb_sites_apostas.pk_id_site_aposta)
              WHERE
                  fk_id_usuario = :fk_id_usuario;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('fk_id_usuario', $this->__get('pk_id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //query para somar tudo o que o usuario apostou e investiu no sistema
    public function usuarioSomaGanhos()
    {
        $query = "SELECT
                  SUM(value_recept) AS resultado
                FROM
                    tb_apostas
                WHERE
                    fk_id_usuario = :fk_id_usuario;";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_usuario", $_SESSION['pk_id_usuario']);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //query para editar aposta pelo usuario padrão
    public function editAposta()
    {
        $query = "UPDATE 
                    tb_apostas
                  SET
                    fk_site_aposta = :fk_site_aposta,
                    data_bet = :data_bet,                   
                    value_bet = :value_bet,
                    value_recept = :value_recept,
                    id_bet = :id_bet,
                    resultado_aposta = :resultado_aposta
                  WHERE
                    fk_id_usuario = :fk_id_usuario and pk_id_aposta = :pk_id_aposta"; 
        $stmt = $this->db->prepare($query);

        $stmt->bindValue('fk_site_aposta',$this->__get('fk_site_aposta'));
        $stmt->bindValue('data_bet',$this->__get('data_bet'));        
        $stmt->bindValue('value_bet',$this->__get('value_bet'));
        $stmt->bindValue('value_recept',$this->__get('value_recept'));
        $stmt->bindValue('id_bet',$this->__get('id_bet'));
        $stmt->bindValue('resultado_aposta',$this->__get('resultado_aposta'));
        $stmt->bindValue('fk_id_usuario',$this->__get('fk_id_usuario'));
        $stmt->bindValue('pk_id_aposta',$this->__get('pk_id_aposta'));

        $stmt->execute();

        return $this;
    }    
}
