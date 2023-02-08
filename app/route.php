<?php
namespace App;
use AB\init\Bootstrap;

class Route extends Bootstrap{
    public function initRoutes(){
        $index= null;
        if($this->getUrl() == '/' || $this->getUrl() == '/home'){
            $index = $this->getUrl();
        }
        $routes['page_home'] = array(
            'route' => $index,
            'controller' => 'IndexController',
            'action' => 'index',
        ); 
        $routes['page_sobre_nos'] = array(
            'route' => '/sobre-nos',
            'controller' => 'IndexController',
            'action' => 'pageSobreNos',
        );
        $routes['page_banho_e_tosa'] = array(
            'route' => '/servico-banho-e-tosa',
            'controller' => 'IndexController',
            'action' => 'pageBanhoETosa',
        );
        $routes['page_veterinario'] = array(
            'route' => '/servico-veterinario',
            'controller' => 'IndexController',
            'action' => 'pageVeterinario',
        );
        $routes['page_acessorios'] = array(
            'route' => '/servico-acessorios',
            'controller' => 'IndexController',
            'action' => 'pageAcessorios',
        );
        $routes['page_farmacia'] = array(
            'route' => '/servico-farmacia',
            'controller' => 'IndexController',
            'action' => 'pageFarmacia',
        );
        $routes['page_hospedagem'] = array(
            'route' => '/servico-hospedagem',
            'controller' => 'IndexController',
            'action' => 'pageHospedagem',
        );
        $routes['page_cadastrar'] = array(
            'route' => '/cadastrar',
            'controller' => 'IndexController',
            'action' => 'cadastrar',
        );
        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'IndexController',
            'action' => 'registrar',
        );
        $routes['page_entrar'] = array(
            'route' => '/entrar',
            'controller' => 'IndexController',
            'action' => 'entrar',
        );
        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar',
        );
        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'IndexController',
            'action' => 'sair',
        );
        $routes['page_relatar_problema1'] = array(
            'route' => '/relatar-problema1',
            'controller' => 'RelatosController',
            'action' => 'relatarProblema1',
        );
        $routes['page_relatar_problema2'] = array(
            'route' => '/relatar-problema2',
            'controller' => 'RelatosController',
            'action' => 'relatarProblema2',
        );
        $routes['registrar_relato'] = array(
            'route' => '/registrar-relato',
            'controller' => 'RelatosController',
            'action' => 'registrarRelato',
        );
        $routes['page_view_relatos'] = array(
            'route' => '/view-relatos',
            'controller' => 'RelatosController',
            'action' => 'relatos',
        );
        $routes['page_perfil'] = array(
            'route' => '/perfil',
            'controller' => 'RelatosController',
            'action' => 'perfil',
        );
        $routes['remover_relato'] = array(
            'route' => '/remover-relato',
            'controller' => 'RelatosController',
            'action' => 'removerRelato',
        );
        $routes['page_entrar_admin']= array(
            'route' => '/entrar-admin',
            'controller'=> 'IndexController',
            'action'=>'entrarAdmin'
        );
        $routes['autenticar_admin']= array(
            'route' => '/autenticar-admin',
            'controller'=> 'AuthController',
            'action'=>'autenticarAdmin'
        );
        $routes['page_dashboard']= array(
            'route' => '/page-dashboard',
            'controller'=> 'AdminController',
            'action'=>'dashboard'
        );
        $routes['page_veterinarios']= array(
            'route' => '/veterinarios',
            'controller'=> 'AdminController',
            'action'=>'veterinarios'
        );
        $routes['page_perfil_admin']= array(
            'route' => '/perfil-admin',
            'controller'=> 'AdminController',
            'action'=>'perfilAdmin'
        );
        $routes['enviar_resposta']= array(
            'route' => '/enviar-resposta',
            'controller'=> 'AdminController',
            'action'=>'enviarResposta'
        );
        $routes['page_add_vet']= array(
            'route' => '/add-vet',
            'controller'=> 'AdminController',
            'action'=>'pageAddVet'
        );
        $routes['registrar_vet']= array(
            'route' => '/registrar-vet',
            'controller'=> 'AdminController',
            'action'=>'registrarVet'
        );
        $routes['remover_vet']= array(
            'route' => '/remover-vet',
            'controller'=> 'AdminController',
            'action'=>'removerVet'
        );

        $this->setRoutes($routes);
    }

}