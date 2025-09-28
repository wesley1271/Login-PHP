<?php

//iniciar a sessão
session_start();
//constante de controle
define('CONTROL', true);

//verifica usuario logado
$usuario_logado = $_SESSION['usuario'] ?? null;

//verifica qual é a rota na URL

if (empty($usuario_logado)) {
    $rota = 'login';
} else {
    $rota = $_GET['rota'] ?? 'home';
}

//se o usuario esta logado, mas a rota é login, ele continuará no home

if (!empty($usuario_logado)&& $rota == 'login') {
    $rota = 'home';
}
//analisa a rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'sobre' => 'sobre.php',
    'contato' => 'contato.php',
    'logout' => 'logout.php'
];

if (!key_exists($rota, $rotas)) {
    die('Acesso negado');
}
require_once $rotas[$rota];
