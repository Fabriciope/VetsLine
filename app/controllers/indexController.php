<?php
namespace App\controllers;

use AB\controller\Action;
use AB\model\Container;

class IndexController extends Action{
    
    public function index(){
        $this->render('index', 'layout1');
    }

    public function pageSobrenos(){
        $this->render('sobreNos', 'layout1');
    }

    public function pageBanhoETosa(){
        $this->render('banhoETosa', 'layout1');
    }
  
    public function pageVeterinario(){
        $this->render('veterinario', 'layout1');
    }

    public function pageFarmacia(){
        $this->render('farmacia', 'layout1');
    }

    public function pageHospedagem(){
        $this->render('hospedagem', 'layout1');
    }
  
    public function pageAcessorios(){
        $this->render('acessorios', 'layout1');
    }
    public function entrar(){
        $this->view->erroCadastro= '';
        $this->view->entrar='usuario';
        $this->render('entrar', 'layout2');
    }

    public function cadastrar(){
        $this->view->dadosUsuarioErro= array(
            'nome'=> '',
            'email'=>  '',
            'senha'=>  '',
            'confirmacao_senha'=>  '',
        );
        $this->view->erroCadastro= '';
        $this->render('cadastrar', 'layout2');
    }

    public function registrar(){
        $this->view->erro= '';
        $usuario= Container::getModel('usuario');
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));

        $validado= $usuario->validarUsuario();

        if($validado){
            $usuario->registrarUsuario();
            $this->render('registradoComSucesso', null);
        }else{
            $this->view->dadosUsuarioErro= array(
                'nome'=>  $_POST['nome'],
                'email'=>  $_POST['email'],
                'senha'=>  $_POST['senha'],
                'confirmacao_senha'=>  $_POST['confirmacao_senha'],
            );
            $this->view->erroCadastro= '*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.';
            $this->render('cadastrar', 'layout2');
        }
    }

    public function entrarAdmin(){
        $this->view->entrar='admin';
        $this->render('entrar', 'layout2');
    }
    
    public function sair(){
        session_start();
        session_destroy();
        $this->render('index', 'layout1');
    }
}