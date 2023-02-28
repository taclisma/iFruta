<?php


$router->get('/', 'controllers/index.php');


$router->post('/auth', 'controllers/auth.php');

$router->get('/registrar', 'controllers/registo.php');
$router->post('/registrar', 'controllers/registrar.php');