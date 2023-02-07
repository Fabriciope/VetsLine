<?php
namespace AB\model;
use App\Connection;
class Container{
    public static function getModel($model){
        $class= "\\App\\model\\" . ucfirst($model);
        $conn= Connection::getDB();
        return new $class($conn);
    }
}