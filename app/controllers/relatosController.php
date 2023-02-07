<?php
namespace App\controllers;

use AB\controller\Action;
use AB\model\Container;

class RelatosController extends Action{

    public function relatarProblema1(){
        session_start();
        $this->view->dadosUsuarioErro= array(
            'nome'=> '',
            'email'=>  '',
            'senha'=>  '',
            'confirmacao_senha'=>  '',
        );
        if(!empty($_SESSION)){
            $this->render('relatarProblema2', null);
        }else{
            $this->render('relatarProblema1', 'layout2');
        }
    }
    public function relatarProblema2(){
        $this->validarUsuario();
        $this->render('relatarProblema2', null);
    }

    public function registrarRelato(){
        $this->validarUsuario();
        if(empty($_POST['nivel']) || $_POST['animal'] == 'selecione a espécie' || empty($_POST['relato'])){
            $this->view->erro='campos_incorretos';
            $this->render('relatarProblema2', null);
        }else{
            $relato= Container::getModel('relato');
            $relato->__set('id_usuario', $_SESSION['id']);
            $relato->__set('nivel', $_POST['nivel']);
            $relato->__set('animal', $_POST['animal']);
            $relato->__set('relato', $_POST['relato']);
            $relato->registrarRelato();
            $this->render('relatadoComSucesso', null);
        }
    }

    public function removerRelato(){
        $this->validarUsuario();
        $relato= Container::getModel('relato');
        $relato->__set('id', $_POST['id']);
        $relato->remover();
        header('location: /view-relatos');

    }

    public function relatos(){
        $this->validarUsuario();
        $relato= Container::getModel('relato');
        $relato->__set('id_usuario', $_SESSION['id']);
        $relatos= $relato->recuperarRelatosUser();
        $this->view->relatos=$relatos;
        $this->render('viewRelatos', 'layout3');
    }

    public function perfil(){
        $this->validarUsuario();
        $usuario= Container::getModel('usuario');
        $usuario->__set('id', $_SESSION['id']);
        $user= $usuario->recuperarInfoUser();
        $this->view->info_user= $user;
        $this->render('perfil', 'layout3');
    }

    public function validarUsuario(){
        session_start();
         if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '' || $_SESSION['nivel'] != 1){
            header('location:/home'); 
        }
    }
}