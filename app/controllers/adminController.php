<?php
namespace App\controllers;

use AB\controller\Action;
use AB\model\Container;

class AdminController extends Action{

    public function dashboard(){
        $this->validarAdmin();
        $admin= Container::getModel('admin');
        $relatos_pedentes= $admin->recuperarRelatosPendentes();
        $this->view->relatosPendentes= $relatos_pedentes;
        $this->render('dashboard', 'layout3');
    }

    public function enviarResposta(){
        $relato= Container::getModel('relato');
        $relato->__set('id', $_GET['id-relato']);
        $relato->__set('resposta', $_POST['resposta']);
        $relato->enviarResposta();
        header('location: /page-dashboard');
    }

    public function veterinarios(){
        $this->validarAdmin();
        $admin= Container::getModel('admin');
        $veterinarios= $admin->recuperarVeterinarios();
        $this->view->veterinarios= $veterinarios;
        $this->render('veterinarios', 'layout3');
    }

    public function pageAddVet(){
        $this->view->dadosUsuarioErro= array(
            'nome'=> '',
            'email'=>  '',
            'senha'=>  '',
            'confirmacao_senha'=>  '',
        );
        $this->view->erroCadastro= '';
        $this->render('addVet', 'layout2');
    }

    public function registrarVet(){
        $this->validarAdmin();
        $admin= Container::getModel('admin');
        $admin->__set('nome', $_POST['nome']);
        $admin->__set('email', $_POST['email']);
        $admin->__set('senha', md5($_POST['senha']));

        $validado= $admin->validarVet();

        if($validado == true){
            $admin->registrarVet();
            $this->render('vetCadastradoComSucesso', null);
        }else{
            $this->view->dadosUsuarioErro= array(
                'nome'=>  $_POST['nome'],
                'email'=>  $_POST['email'],
                'senha'=>  $_POST['senha'],
                'confirmacao_senha'=>  $_POST['confirmacao_senha'],
            );
            $this->view->erroCadastro= '*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.';
            $this->render('addVet', 'layout2');
        }
    }

    public function removerVet(){
        $admin= Container::getModel('admin');
        $admin->__set('id', $_GET['id-vet']);
        $admin->removerVet();
        // $this->render('veterinarios', 'layout3');
        header('location: /veterinarios');
    }

    public function perfilAdmin(){
        $this->validarAdmin();
        $usuario= Container::getModel('admin');
        $usuario->__set('id', $_SESSION['id']);
        $user= $usuario->recuperarInfoAdmins();
        $this->view->info_user= $user;
        $this->render('perfilAdmin', 'layout3');
    }


    public function validarAdmin(){
        session_start();
        if($_SESSION['nivel'] == 1 || !isset($_SESSION['nivel'])){
            header('location: /home');
        }
    }
}
