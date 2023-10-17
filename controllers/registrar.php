<?php
use Core\App;
use Core\Response;


//grava no banco novo registro

auth(($_POST['user'] === $_SESSION['usuario']['matricula']), Response::FORBIDDEN);

$db = App::container()->resolve('Core\Database');

$db->query('INSERT INTO REGISTROS (matricula_aluno) VALUES(:usuario_matricula);', ['usuario_matricula' => $_SESSION['usuario']['matricula']]);
$data_reg = $db->query('SELECT registro from REGISTROS where matricula_aluno = :user && cast(registro as Date) = cast(current_timestamp() as Date);', ['user' => $_POST['user']])->fetchOrFail(Response::FORBIDDEN);

$_SESSION['data_reg'] = $data_reg['registro'];
$_SESSION['status'] = 'feito';

// redireciona para pag animação
view('feito.view.php', ['status' => 'feito', 'data' => $_SESSION['data_reg']], '/registro');
exit();