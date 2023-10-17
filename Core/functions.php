<?php

#
# Util
#

//verbose error display for ldap bind
function ldap_test($bind, $conn){
    if ($bind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
        ldap_get_option($conn, LDAP_OPT_DIAGNOSTIC_MESSAGE, $err);
        echo "ldap_get_option: $err";
    }
}

function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

# require controller
function base_path($path){
    return BASE_PATH . $path;
}


# require view
function view($path, $props = [], $link = null){
    extract($props);
    require base_path('views/' . $path);
    if ($link) {
        $link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
        echo '<script>window.history.pushState({}, "", "' . $link . '");</script>';
    }
}



// duplicada em router
# requests error code and die
function abort($code = 404){
    http_response_code($code);

    require base_path("views/error/{$code}.php");

    die();
}


function auth($condition, $err = [404]){
    if(! $condition){
        abort($err);
    }
}