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
  private $email;
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
                      email,
                      fk_id_departamento
                    )
                  VALUES
                    (
                      :usuario,
                      :senha,
                      :tipo_usuario,
                      :email,
                      :departamento
                    );";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':usuario', $this->__get('usuario'));
    $stmt->bindValue(':senha', $this->__get('senha'));
    $stmt->bindValue(':tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue(':email', $this->__get('email'));
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
                    senha = :senha";
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
                  email,
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
                  pk_id_usuario = :pk_id_usuario;";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));

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
                  tb_usuarios;";
    $stmt = $this->db->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  //query deletar usuario especifico
  public function deleteUser()
  {
    $query = "SET FOREIGN_KEY_CHECKS = 0;
              DELETE FROM 
                  tb_usuarios 
              WHERE 
                  pk_id_usuario = :pk_id_usuario;
              SET FOREIGN_KEY_CHECKS = 1;";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':pk_id_usuario', $this->__get('pk_id_usuario'));

    $stmt->execute();
    return $this;
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
    $query = "UPDATE 
                  tb_usuarios 
              SET 
                  email = :email,
                  usuario = :usuario,
                  tipo_usuario = :tipo_usuario,
                  fk_id_departamento = :departamento
              WHERE
                  pk_id_usuario = :pk_id_usuario;";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue('email', $this->__get('email'));
    $stmt->bindValue('usuario', $this->__get('usuario'));
    $stmt->bindValue('tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue('departamento', $this->__get('departamento'));
    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));

    $stmt->execute();
    return $this;
  }

  //query para adicionar departamento
  public function add_departamento()
  {
    $query = 'INSERT INTO tb_departamentos
                        (
                          departamento
                        )
                      VALUES
                        (
                          :departamento
                        )';
    
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':departamento',$this->__get('departamento'));

    $stmt->execute();

    return $this;
  }

  //query para deletar um usuario especifico
  public function adminDeletarChamado()
  {
    $query = 'DELETE FROM 
                tb_chamados
              WHERE
                pk_id_chamado = :pk_id_chamado';
    
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':pk_id_chamado',$this->__get('pk_id_chamado'));

    $stmt->execute();
    return $this;
  }

  //query para responder o chamado
  public function responder_chamado()
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

  //query para deletar um departamento especifico
  public function delete_departamento()
  {
    $query = "SET FOREIGN_KEY_CHECKS = 0;
              DELETE FROM
                tb_departamentos
              WHERE 
                pk_id_departamento = :pk_id_departamento;
              SET FOREIGN_KEY_CHECKS = 1;";
    
    $stmt = $this->db->prepare($query);

    $stmt->bindValue("pk_id_departamento",$this->__get('pk_id_departamento'));

    $stmt->execute();

    return $this;
  }
 
}
