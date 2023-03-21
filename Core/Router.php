<?php

#
# navegação e http requests 
#

namespace Core;

class Router {
    protected $routes = [];
    
    protected function add($uri, $controller, $method){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'only' => null
    
        ];

        return $this;
    }

    public function get($uri, $controller){
        return $this->add($uri, $controller, 'GET');
    }


    public function post($uri, $controller){
        return $this->add($uri, $controller, 'POST');
    }


    // metodo para validação de pedido de pagina a nivel de rota
    public function only($key){
        $this->routes[array_key_last($this->routes)]['only'] = $key;
        return $this->routes;
    }


    public function route($uri, $method){

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
            #############
            #   redirecionamento de rotas para usuário não acessar paginas que nao tem acesso

                if($route['only'] === 'guest'){
                    if($_SESSION['current_user'] ?? false){
                        header('location: /registro');
                        exit();
                    }
                }

                if($route['only'] === 'auth'){
                    if(!$_SESSION['current_user'] ?? false){
                        header('location: /');
                        exit();
                    }
                }
            #   
            ############
            
                return require base_path($route['controller']);
                
            }
        }

        $this->abort();
    }

    protected function abort($code = 404){
        http_response_code($code);

        require base_path("views/error/{$code}.php");

        die();
    
    }

}