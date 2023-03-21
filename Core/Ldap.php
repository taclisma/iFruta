<?php 

// conectar e checar ldap

namespace Core;

class Ldap {
    protected $conn;
    protected $config;

    public function __construct($config){
        $this->config = $config;
        $this->conn = ldap_connect($config['uri']) or die("Could not connect to LDAP server.");
        ldap_set_option($this->conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        // var_dump($this->conn); //se retorna obj vazio conexao funcionou
    }
    

    public function user_auth($user, $pass){
        $ldap_user = 'uid='.$user .$this->config['dc'];
        return ldap_bind($this->conn, $ldap_user, $pass);

    }
}

?>