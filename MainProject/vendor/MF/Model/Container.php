<?php
namespace MF\Model;

use App\Connection;

class Container{
    public static function getModel($model){
        //instanciando conexão com banco de dados
        $conn = Connection::getDb();        
        
        //inciando modelo
        $class = "\\App\\Models\\".ucfirst($model);        

        //retornando po modelo instanciado inclusive com a conexão de banco ja estabelecida

        return new $class($conn);
    }
}
