<?php
namespace AB\init;

abstract class Bootstrap{
    private $routes;

    abstract protected function initRoutes();

    public function __construct(){
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes(Array $valor){
        $this->routes= $valor;
    }

    public function run($url){
        foreach($this->getRoutes() as $route){
            if($url == $route['route']){
                $class= "\\App\\controllers\\" . ucfirst($route['controller']);
                $controller= new $class;
                $action= $route['action'];
                $controller->$action();
            }
        }
    }
    
    public function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}