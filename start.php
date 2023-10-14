<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Ldap;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    //troca config para prod
    return new Database($config['dblocal']);
});

$container->bind('Core\Ldap', function(){
    $config = require base_path('config.php');
    return new Ldap($config['ldap']);
});


$db = $container->resolve('Core\Database'); 
$ldap = $container->resolve('Core\Ldap');


App::setContainer($container); 