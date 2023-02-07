<?php
namespace AB\controller;

abstract class Action{
    protected $view;
    public function __construct(){
        $this->view= new \stdclass();
    }
    protected function render($view, $layout){
        $this->view->page = $view;
        if(file_exists("../app/views/" . $layout . ".phtml")){
            require_once "../app/views/" . $layout. ".phtml";
        }else{
            $this->content();
        }
    }
    protected function content(){
        $classAtual = get_class($this);

		$classAtual = str_replace('App\\controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));
        require_once "../app/views/".$classAtual."/".$this->view->page.".phtml";
    }
}