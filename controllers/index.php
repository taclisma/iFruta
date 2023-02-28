<?php


//funciona, é seguro?
if (isset($_SESSION['current_user']) && !empty($_SESSION['current_user'])){
    // fazer isso funcionar com novo redicionamento do auth com o mostrar erro
    // heading ou kill session ou passa pro controler do auth denovo  
}    

view('index.view.php');