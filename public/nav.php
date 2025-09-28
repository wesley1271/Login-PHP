<?php 
defined('CONTROL') or die("Acesso negado!");

?>

<hr>
     <nav>
            <ul>
                <li><a href="?rota=home">Início</a></li>
                <li><a href="?rota=sobre">Sobre</a></li>
                <li><a href="?rota=contato">Contato</a></li>
                <li><a href="?rota=logout">Sair</a></li>
            </ul>
        </nav>
        <hr>
        <span>Usuário: <strong><?= $_SESSION['usuario'] ?></strong></span>
        
        <hr>
