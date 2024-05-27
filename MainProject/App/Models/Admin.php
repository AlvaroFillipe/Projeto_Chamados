<?php

namespace App\Models;

use MF\Model\Model;

class Admin extends Model
{

  //PK´s
  private $pk_id_usuario;   

  //dados normais
  private $departamento;
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
                      categoria_usuario
                    )
                  VALUES
                    (
                      :usuario,
                      :senha,
                      :tipo_usuario,
                      :email,
                      :categoria_usuario
                    );";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':usuario', $this->__get('usuario'));
    $stmt->bindValue(':senha', $this->__get('senha'));
    $stmt->bindValue(':tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue(':email', $this->__get('email'));
    $stmt->bindValue(':categoria_usuario', $this->__get('categoria_usuario'));

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
                  categoria_usuario 
              FROM
                  tb_usuarios 
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
                  departamento 
              FROM 
                  tb_usuarios;";
    $stmt = $this->db->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  //query deletar usuario especifico
  public function deleteUser()
  {
    $query = "DELETE FROM 
                  tb_usuarios 
              WHERE 
                  pk_id_usuario = :pk_id_usuario;";

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
                  categoria_usuario = :categoria_usuario
              WHERE
                  pk_id_usuario = :pk_id_usuario;";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue('email', $this->__get('email'));
    $stmt->bindValue('usuario', $this->__get('usuario'));
    $stmt->bindValue('tipo_usuario', $this->__get('tipo_usuario'));
    $stmt->bindValue('categoria_usuario', $this->__get('categoria_usuario'));
    $stmt->bindValue('pk_id_usuario', $this->__get('pk_id_usuario'));

    $stmt->execute();
    return $this;
  }

  //query para adicionar site no sistema
  public function addSite()
  {
    $query = 'INSERT INTO 
                    tb_sites_apostas
                    (
                      Departamento                      
                    )
              VALUES
                    (
                      :departamento
                    );';

    $stmt = $this->db->prepare($query);

    $stmt->bindValue('departamento', $this->__get('departamento'));
  

    $stmt->execute();

    return $this;
  }
}
