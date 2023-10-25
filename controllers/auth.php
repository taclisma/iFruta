<?php

// processa se usuário esta apto a retirar ou não

use Core\App;
use Core\Response;


$errors = [];

// resolve classes no container
$ldap = App::container()->resolve('Core\Ldap');
$db = App::container()->resolve('Core\Database');


// autentica login LDAP ou usuario incorreto
$autorizar = $ldap->pesquisaUsuario($_POST['user'],$_POST['senha']);


if(empty($autorizar)){
    $errors['ldap'] = 'Usuário ou senha incorretos..';
}

// caso encontrar erros, volta para o index e mostra erros na tela (acima do botao de entrar)


// if (autorizar['curso'] existe em cursos)
// query banco: ve cursos
// 'SELECT id_curso FROM CURSOS WHERE id_curso = :curso;', ['curso' => $autorizar['curso']] 
if ($db->query('SELECT id_curso FROM CURSO WHERE id_curso = :curso;', ['curso' => $autorizar['curso']])->fetch()) {
    $curr_user = $db->query('SELECT matricula FROM ALUNOS WHERE matricula = :matricula;', ['matricula' => $autorizar['matricula']])->fetch();
    
    if(!$curr_user){ 
        auth(empty($db->query('INSERT INTO ALUNOS (matricula, id_curso, nome, login) VALUES(:matricula, :id_curso, :nome, :login);',
        ['matricula' => $autorizar['matricula'], 'id_curso' => $autorizar['curso'], 'nome' => $autorizar['nome'] , 'login' => $autorizar['login']])->fetch()),
        Response::NOT_FOUND); // trocar erro
    }
    $_SESSION['usuario'] = $db->query('SELECT * FROM ALUNOS WHERE matricula = :matricula;', ['matricula' => $autorizar['matricula']])->fetchOrFail(Response::FORBIDDEN);
    
    
    header('location: /registro');
}

$errors['ldap'] = 'O seu curso não parece ter permissão de retirada.';
if(!empty($errors)){
    view('index.view.php', ['errors' => $errors]);
    exit();
}
        // procura user no banco (só tem alunos de ensino medio) ou vai para pagina erro de autorização


