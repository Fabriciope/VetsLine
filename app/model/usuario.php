<?php
namespace App\model;
use AB\model\Model;

class Usuario extends Model{
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;

    public function registrarUsuario(){
        $query= "insert into usuario (nome, email, senha) values (:nome, :email, :senha)";
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':nome', $this->__get('nome'));
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->bindValue(':senha', $this->__get('senha'));
        $stmp->execute();
    }
    public function validarUsuario(){
        $validado = true;
        if(mb_strlen($this->__get('nome'), 'UTF-8') < 3){
            $validado = false;
        }else  if(mb_strlen($this->__get('email'), 'UTF-8') < 3){
            $validado = false;
        }else  if(mb_strlen($this->__get('senha'), 'UTF-8') < 3){
            $validado = false;
        }else  if($_POST['confirmacao_senha'] != $this->__get('senha')){
            $validado = false;
        }
        
        $query= "select email from usuario where email = :email";
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->execute();
        $quantEmail= $stmp->fetchAll(\PDO::FETCH_ASSOC);
        if(count($quantEmail) >= 1){
            $validado= false;
        }
        return $validado;
    }
    public function recuperarInfoUser(){
        $query='select id, nome, email, senha from usuario where id = :id';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':id', $this->__get('id'));
        $stmp->execute();
        return $stmp->fetch(\PDO::FETCH_ASSOC);
    }
    public function autenticar(){
        $query= 'select id, nome, email from usuario where  email = :email and senha = :senha';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->bindValue(':senha', $this->__get('senha'));
        $stmp->execute();
        return $stmp->fetch(\PDO::FETCH_ASSOC);
    }
}