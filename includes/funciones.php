<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'], $path ) ? true : false;
}

function is_auth() : bool {
    session_start();
    return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
}