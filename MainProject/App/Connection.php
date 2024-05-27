<?php
namespace App;


class Connection{
    public static function getDb() {
        try {
            $conn = new \PDO(
                "mysql:host=127.0.0.1;dbname=db_projeto_chamados;charset=utf8",#dados do banco
                "root", #user
                ""      #password                
            );
            return $conn;

        } catch (\PDOException $e) {
            
        }
    }


}