<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

// query banco para checar registros, adicionar trigger na database para nao permitir um registro por dia
// retorna falso caso nao tenha registro de hoje, retorna o registro caso tenha
$checkRetirado = $db->query('select registro from REGISTROS where id_aluno = :curr_user  && cast(registro as Date) = cast(current_timestamp() as Date);', ['curr_user' => $_SESSION['current_user']])->fetch();


if($checkRetirado){
    // view data do registro, animação amarela
    $_SESSION['data_reg'] = $checkRetirado['registro'];
    view('feito.view.php', ['matricula' => $_SESSION['current_user'], 'data' => $_SESSION['data_reg']]);
    exit();
}

//  vai para pagina do botão de registrar
view('auth.view.php', ['matricula' => $_SESSION['current_user']]);
