<?php
namespace App\model;

use AB\model\Model;

class Admin extends Model{
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;

    public function autenticarAdmin(){
        $query= 'select id, nome, email from admins where  email = :email and senha = :senha';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->bindValue(':senha', $this->__get('senha'));
        $stmp->execute();
        return $stmp->fetch(\PDO::FETCH_ASSOC);
    }

    public function recuperarVeterinarios(){
        $query= 'select id, nome, email, senha from admins where id != 1';
        $stmp= $this->db->query($query);
        $stmp->execute();
        return $stmp->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function recuperarRelatosPendentes(){
        $query= 'select 
        r.id, u.nome, r.nivel, r.animal, r.relato, r.resposta
        FROM
        relatos as r
        left join usuario as u on(r.id_usuario = u.id) 
        order by
        data desc';
        $stmp= $this->db->query($query);
        $stmp->execute();
        return $stmp->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function registrarVet(){
        $query= 'insert into admins (nome, email, senha) values (:nome, :email, :senha)';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':nome', $this->__get('nome'));
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->bindValue(':senha', $this->__get('senha'));
        $stmp->execute();
    }

    public function removerVet(){
        $query= 'delete from admins where id = :id';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':id', $this->__get('id'));
        $stmp->execute();
    }
    
    public function validarVet(){
        $validado = true;
        if(mb_strlen($this->__get('nome'), 'UTF-8') < 3){
            $validado = false;
        }else  if(mb_strlen($this->__get('email'), 'UTF-8') < 3){
            $validado = false;
        }else  if(mb_strlen($this->__get('senha'), 'UTF-8') < 3){
            $validado = false;
        }else  if(md5($_POST['confirmacao_senha']) != $this->__get('senha')){
            $validado = false;
        }
        
        $query= "select email from admins where email = :email";
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':email', $this->__get('email'));
        $stmp->execute();
        $quantEmail= $stmp->fetchAll(\PDO::FETCH_ASSOC);
        if(count($quantEmail) >= 1){
            $validado= false;
        }
        return $validado;
    }

    public function recuperarInfoAdmins(){
        $query='select id, nome, email, senha from admins where id = :id';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':id', $this->__get('id'));
        $stmp->execute();
        return $stmp->fetch(\PDO::FETCH_ASSOC);
    }
}