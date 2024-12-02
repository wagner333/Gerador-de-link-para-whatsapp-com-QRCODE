<?php
// router/routes.php

$rotas = [
    '/' => 'index',                // Página inicial
   

];

function index(){
    require '../app/views/index.php';
}




function gerenciarRotas($url) {
    global $rotas;

    if (array_key_exists($url, $rotas)) {
        $acao = $rotas[$url];
        call_user_func($acao); // O nome da função correspondente ao array de rotas
    } else {
        header("HTTP/1.0 404 Not Found");
        require "../app/err/index.php";
        exit();
    }
}
