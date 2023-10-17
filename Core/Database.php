<?php 

// conectar, executar e query no banco

namespace Core;
use PDO;

class Database {
    protected $conn;
    protected $statement;

    public function __construct($config){
        //$dsn = "mysql:" . http_build_query($config, '', ';');
        //$this->conn = New PDO($dsn, options:[PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]);
    
        $dsn = "mysql:dbname=".$config['dbname'].";host=".$config['host'];
        $this->conn = New PDO($dsn, $config['user'], $config['password']);


    }
    
    public function query($query, $params = []){

        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($params);
        return $this; 

    }

    // fetch obj
    public function fetch(){
        return $this->statement->fetch();
    }
    
    public function fetchOrFail($err = 404){
        $prop = $this->fetch();

        if(! $prop){
            abort($err);
        }
        return $prop;
    }

    // fetch array
    public function get(){
        return $this->statement->fetchAll();
    }

    public function getOrFail($err = 404){
        $prop = $this->get();

        if(! $prop){
            abort($err);
        }

        return $prop;
    }
}

?>