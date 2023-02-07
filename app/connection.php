<?php
namespace App;

class Connection{

    public static function getDB(){
        $host= 'localhost';
        $dbName= 'pets';
        $user= 'root';
        $password= '';
        try{
            $connection= new \PDO(
                "mysql:host=$host;dbname=$dbName;charset=utf8",
                "$user",
                "$password"
            );
            return $connection;
        }catch(\PDOException $e){
            echo "Erro ao conectar com o banco de dados. Erro: " . $e;
        }
    }
}