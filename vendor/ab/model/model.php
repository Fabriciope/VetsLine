<?php
namespace AB\model;

abstract class Model{
    protected $db;
    public function __construct(\PDO $db){
        $this->db= $db;
    }
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo= $valor;
    }
}