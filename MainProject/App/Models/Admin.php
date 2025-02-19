<?php

namespace App\Models;

use MF\Model\Model;

class Admin extends Model
{

  //PK´s
  private $pk_id_usuario;   
  private $pk_id_chamado; 
  
  //FK´s
  private $fk_id_departamento;

  //dados normais
  
  private $tipo_usuario;
  private $usuario;



  //METODOS GET E SET MAGICOS 
  public function __get($atributo)
  {
    return $this->$atributo;
  }

  public function __set($atributo, $valor)
  {
    $this->$atributo = $valor;
  }


  //query para criar login
  public function createUser()
  {
    $query = "INSERT INTO tb_usuarios                    
                    (
                      usuario,
                      senha,
                      tipo_usuario,
                      fk_id_departamento,
                      situacao_usuario
                    )
                  VALUES
                    (
                      :usuario,
                      :senha,
                      :tipo_usuario,
                      :departamento,
                      1
                    );";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':usuario', $this->__get('usuario'));
    $stmt->bindValue(':senha', $this->__get('senha'));
    $stmt->bindValue(':tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue(':departamento', $this->__get('departamento'));

    $stmt->execute();
    return $this;
  }

  //query para autenticar usuario que vai fazer login
  public function autenticar()
  {
    $query = "SELECT 
                    pk_id_usuario,
                    usuario,
                    senha,
                    tipo_usuario 
                  FROM 
                    tb_usuarios 
                  WHERE 
                    usuario = :usuario 
                  AND 
                    senha = :senha
                  AND
                    situacao_usuario = 1;";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue('usuario', $this->__get('usuario'));
    $stmt->bindValue('senha', $this->__get('senha'));

    $stmt->execute();

    //selecionando apenas o primeiro registro do banco com a função fetch
    $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($usuario['pk_id_usuario'] != '' and $usuario['usuario'] != '') {
      $this->__set('pk_id_usuario', $usuario['pk_id_usuario']);
      $this->__set('usuario', $usuario['usuario']);
      $this->__set('tipo_usuario', $usuario['tipo_usuario']);
    }
    return $this;
  }

  //query para pegar um usuario especifico
  public function adminGetUsuario()
  {
    $query = "SELECT 
                  pk_id_usuario,
                  usuario,
                  tipo_usuario,
                  fk_id_departamento,
                  departamento
                  
              FROM
                  tb_usuarios 
              LEFT JOIN
                  tb_departamentos
              ON
                  tb_usuarios.fk_id_departamento = tb_departamentos.pk_id_departamento
              WHERE 
                  pk_id_usuario = :pk_id_usuario AND situacao_usuario = 1;";

    $stmt = $this->db->prepare($query); 
    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  //query para chamar TODOS os usuarios que normais que estao ativoso
  public function getUsuariosNormais(){
    $query = "SELECT 
                  pk_id_usuario,
                  usuario,
                  tipo_usuario,
                  fk_id_departamento,
                  departamento                  
              FROM
                  tb_usuarios 
              LEFT JOIN
                  tb_departamentos
              ON
                  tb_usuarios.fk_id_departamento = tb_departamentos.pk_id_departamento
              WHERE 
                  tipo_usuario = 2
                  
              ORDER BY
                  usuario ASC";

                  $stmt = $this->db->prepare($query);
                  $stmt->execute();

                  return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  //query para pegar TODOS os usuarios
  public function adminGetUsuarios()
  {
    $query = "SELECT 
                  pk_id_usuario,
                  usuario,
                  tipo_usuario,
                  fk_id_departamento 
              FROM 
                  tb_usuarios WHERE situacao_usuario = 1
              ORDER BY
                  usuario ASC;";
    $stmt = $this->db->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  //query mudar senha
  public function mudarSenha()
  {
    $query = "UPDATE 
                  tb_usuarios 
              SET 
                  senha = :senha 
              WHERE 
                  pk_id_usuario = :pk_id_usuario;";

    $stmt = $this->db->prepare($query);

    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));
    $stmt->bindValue('senha', $this->__get('senha'));

    $stmt->execute();
    return $this;
  }

  //query para editar um usuario especifico
  public function editarUsuario()
  {
    $query = "
              SET FOREIGN_KEY_CHECKS = 0;
              UPDATE 
                  tb_usuarios 
              SET                   
                  usuario = :usuario,
                  tipo_usuario = :tipo_usuario,
                  fk_id_departamento = :departamento
              WHERE
                  pk_id_usuario = :pk_id_usuario;
                  SET FOREIGN_KEY_CHECKS = 1;
              ";

    $stmt = $this->db->prepare($query);

   
    $stmt->bindValue('usuario', $this->__get('usuario'));
    $stmt->bindValue('tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue('departamento', $this->__get('departamento'));
    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));

    $stmt->execute();
    return $this;
  }

  //query para adicionar departamento
  public function addDepartamento()
  {
    $query = 'INSERT INTO tb_departamentos
                        (
                          departamento,
                          situacao_departamento
                        )
                      VALUES
                        (
                          :departamento,
                          1
                        )';
    
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':departamento',$this->__get('departamento'));

    $stmt->execute();

    return $this;
  }

  //query para responder o chamado
  public function responderChamado()
  {
    $query = "UPDATE 
                tb_chamados
              SET 
                solucao_chamado = :solucao_chamado,
                status_chamado = 2
              WHERE
                pk_id_chamado = :pk_id_chamado
              ";

    $stmt = $this->db->prepare($query);

    $stmt->bindValue('solucao_chamado',$this->__get('solucao_chamado'));
    $stmt->bindValue('pk_id_chamado',$this->__get('pk_id_chamado'));

    $stmt->execute();

    return $this;

  }

  //query para pegar apenas um chamado de acordo com um usuario especifico
  public function adminGetAllChamados()
  {
      $query = 'SELECT
                      pk_id_chamado,
                      usuario,
                      fk_id_usuario,
                      departamento,                        
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
                  situacao_chamado = 1
                  
                  ORDER BY
                      data_chamado DESC';
                  
      $stmt = $this->db->prepare($query);
      
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
 
}
