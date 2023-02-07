<?php
namespace App\model;

use AB\model\Model;

class Relato extends Model{
    protected $id;
    protected $id_usuario;
    protected $nivel;
    protected $animal;
    protected $relato;
    protected $resposta;

    public function registrarRelato(){
        $query= 'insert into relatos (id_usuario, nivel, animal, relato) values (:id_usuario, :nivel, :animal, :relato)';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmp->bindValue(':nivel', $this->__get('nivel'));
        $stmp->bindValue(':animal', $this->__get('animal'));
        $stmp->bindValue(':relato', $this->__get('relato'));
        $stmp->execute();
    }

    public function remover(){
        $query= 'delete from relatos where id = :id';
        $stmp= $this->db->prepare($query);
        $stmp->bindValue(':id', $this->__get('id'));
        $stmp->execute();
    }

    public function recuperarRelatosUser(){
        $query= 'select 
                id, id_usuario, nivel, animal, relato, resposta
                from 
                relatos
                where
                id_usuario = :id_usuario
                order by data desc';
        $stmp=$this->db->prepare($query);
        $stmp->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmp->execute();
        return $stmp->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function enviarResposta(){
        $query='update relatos set resposta = :resposta where id = :id';
        $stmp=$this->db->prepare($query);
        $stmp->bindValue(':resposta', $this->__get('resposta'));
        $stmp->bindValue(':id', $this->__get('id'));
        $stmp->execute();
    }
}