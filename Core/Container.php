<?php 

namespace Core;

//
// Classe que inicializa outras classes
//

Class Container{

    protected $bindings = [];

    // push no array $bindings
    // param key: caminho do .php
    // param resolver: função de build 
    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }

    // param key: chave a ser buscada
    // no array bindings
    public function resolve($key){
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("Erro de inicialização {$key}");
        }
        
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}