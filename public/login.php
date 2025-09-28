<?php
defined('CONTROL') or die('Acesso negado');
// verifica a submissão 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //verifica se usuario e senha foram submetidos
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if (empty($usuario) || empty($senha)) {
        $erro = "Usuário e senha são obrigatórios!";
    }

    //verifica se o usuário e senha são válidos
    if (empty($erro)) {

        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';
        foreach ($usuarios as $user) {
            if ($user['usuario'] == $usuario && password_verify($senha, $user['senha'])) {

                //efetua o login
                $_SESSION['usuario'] = $usuario;

                //voltar a página inicial
                header('location: index.php?rota=home');
            }
        }
        // login inválido
        $erro = "Usuário e/ou senha inválidos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuário</label>
            <input type="email" name="usuario" id="usuario">
        </div>
        <div>
            <label for="Senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>

        <div class="button">
            <button class="btn btn-secondary" type="submit" > Entrar</button>
        </div>
    </form>
    <?php
    if (!empty($erro)) : ?>
        <p style="color: red"><?= $erro ?> </p>
    <?php endif; ?>
</body>

</html>