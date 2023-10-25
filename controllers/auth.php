<?php

// processa se usuário esta apto a retirar ou não

use Core\App;
use Core\Response;


// caso encontrar erros, volta para o index e mostra erros na tela (acima do botao de entrar)
$errors = [];

// resolve classes no container
#$ldap = App::container()->resolve('Core\Ldap');
$db = App::container()->resolve('Core\Database');

$autorizar = null;
// autentica login LDAP ou usuario incorreto
if (isset($_POST['senha'])){
    $autorizar = $ldap->pesquisaUsuario($_POST['user'],$_POST['senha']);
}


if(!isset($autorizar)){
#    $errors['ldap'] = 'Usuário ou senha incorretos..';
    $autorizar = [
        'matricula' => $_POST['user'],
        'curso' => "POA",
        'nome' => "Teste MostraPoa",
        'login' => "11122233344"
        ];
        
}



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
} else {
    $errors['retirada'] = 'O seu curso não parece ter permissão de retirada.';
}


if(!empty($errors)){
    view('index.view.php', ['errors' => $errors]);
    exit();
}
        // procura user no banco (só tem alunos de ensino medio) ou vai para pagina erro de autorização


