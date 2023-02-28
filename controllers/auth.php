<?php

use Core\App;
use Core\Response;
use Core\Validator;

// processa se usuário esta apto a retirar ou não

$errors = [];

$ldap = App::container()->resolve('Core\Ldap');
$db = App::container()->resolve('Core\Database');


// Autentica login LDAP ou usuario incorreto
if(!$ldap->user_auth($_POST['user'],$_POST['senha'])){
    $errors['ldap'] = 'Usuário ou senha incorretos';
    
    header("Location: .$newURL.php");

    die();
} 


// procura user no banco (só tem alunos de ensino medio) ou vai para pagina erro de autorização
$curr_user = $db->query('SELECT matricula FROM ALUNOS WHERE login = :login;', ['login' => $_POST['user']])->fetchOrFail(Response::FORBIDDEN);


//start session
$_SESSION['current_user'] = $curr_user['matricula'];
//var_dump($_SESSION);


//query db para checar registros, adicionar trigger na database para nao permitir um registro por dia
//retorna falso caso nao tenha registro de hoje, retorna o registro caso tenha
$retirado = $db->query('select registro from REGISTROS where id_aluno = :curr_user;', ['curr_user' => $_SESSION['current_user']])->fetch();


if($retirado){
    //view data do registro, animação amarela
    // $_SESSION['status'] = '' session hijacking ? 
    view('feito.view.php', ['matricula' => $_SESSION['current_user'], 'data' => $retirado['registro']]);
    exit();
}

view('auth.view.php', ['matricula' => $_SESSION['current_user']]);
//  post req in button press
