<?php


$router->get('/', 'controllers/index.php')->only('guest');

$router->post('/auth', 'controllers/auth.php');
$router->get('/auth', 'controllers/auth.php')->only('guest');

$router->get('/registro', 'controllers/registro.php')->only('auth');

$router->post('/registrar', 'controllers/registrar.php')->only('auth');

$router->get('/exit', 'controllers/exit.php');