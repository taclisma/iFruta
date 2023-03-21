<?php

// processa se usuário esta apto a retirar ou não

use Core\App;
use Core\Response;


$errors = [];

// resolve classes no container
$ldap = App::container()->resolve('Core\Ldap');
$db = App::container()->resolve('Core\Database');


// autentica login LDAP ou usuario incorreto
if(!$ldap->user_auth($_POST['user'],$_POST['senha'])){
    $errors['ldap'] = 'Usuário ou senha incorretos';
} 

// caso encontrar erros, volta para o index e mostra erros na tela (acima do botao de entrar)
if(!empty($errors)){
    view('index.view.php', ['errors' => $errors]);
    exit();
}

// procura user no banco (só tem alunos de ensino medio) ou vai para pagina erro de autorização
$curr_user = $db->query('SELECT matricula FROM ALUNOS WHERE login = :login;', ['login' => $_POST['user']])->fetchOrFail(Response::FORBIDDEN);

// adiciona usuario à sessão
$_SESSION['current_user'] = $curr_user['matricula'];


header('location: /registro');
