<?php

use Core\App;
use Core\Response;


//grava no banco novo registro


auth(($_POST['user'] === $_SESSION['current_user']), Response::FORBIDDEN);

$db = App::container()->resolve('Core\Database');

$db->query('INSERT INTO REGISTROS (id_aluno) VALUES(:curr_user);', ['curr_user' => $_SESSION["current_user"]]);
$data_reg = $db->query('SELECT registro from REGISTROS where id_aluno = :user && cast(registro as Date) = cast(current_timestamp() as Date);', ['user' => $_POST['user']])->fetchOrFail(Response::FORBIDDEN);

$_SESSION['data_reg'] = $data_reg['registro'];
$_SESSION['status'] = 'feito';

// redireciona para pag animação
header('location: /registro');

exit();
view('feito.view.php', ['status' => 'feito', 'data' => $_SESSION['data_reg']]);