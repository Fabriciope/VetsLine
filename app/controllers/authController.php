<?php
namespace App\controllers;

use AB\controller\Action;
use AB\model\Container;

class AuthController extends Action{

    public function autenticar(){
        $usuario = Container::getModel('usuario');
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);
        $user= $usuario->autenticar();
        
        if(isset($_GET) && $_GET['page'] == 'relatar-problema1'){

            if(!empty($user['id']) && !empty($user['nome'])){
                session_start();
                $_SESSION['id']= $user['id'];
                $_SESSION['nome']= $user['nome'];
                $_SESSION['email']= $user['email'];
                $_SESSION['nivel']= 1;
                header('location:/relatar-problema2');
               }else{
                header('location:/relatar-problema1?login=erro-entrar');
            }
        }else{
            
            if(!empty($user['id']) && !empty($user['nome'])){
                session_start();
                $_SESSION['id']= $user['id'];
                $_SESSION['nome']= $user['nome'];
                $_SESSION['email']= $user['email'];
                $_SESSION['nivel']= 1;
                header('location:/home');
            }else{
                header('location:/entrar?login=erro-entrar');
            }
        }
    }
    public function autenticarAdmin(){
        $usuario = Container::getModel('Admin');
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);
        $user= $usuario->autenticarAdmin();
        if(!empty($user['id']) && !empty($user['nome'])){
            if($user['id'] == 1){
                session_start();
            $_SESSION['id']= $user['id'];
            $_SESSION['nome']= $user['nome'];
            $_SESSION['email']= $user['email'];
            $_SESSION['nivel']= 3;
            header('location:/page-dashboard');
            }else{
                session_start();
            $_SESSION['id']= $user['id'];
            $_SESSION['nome']= $user['nome'];
            $_SESSION['email']= $user['email'];
            $_SESSION['nivel']= 2;
            header('location:/page-dashboard');
            }
        }else{
            header('location:/entrar-admin?login=erro-entrar');
        }
    }
}