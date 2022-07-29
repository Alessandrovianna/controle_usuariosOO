<?php
session_start();
require 'config.php';
require 'usuarios.class.php';

$l = new Usuarios();
$l->verificarLogin();
?>

<a href="adicionar.php">Adicionar Novo Usuário</a>
<table border="1" width="100%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php
        $s = new Usuarios();
        $s->selecionarTudo()
    ?>
</table>
<a href="sair.php">Sair</a>