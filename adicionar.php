<?php
require 'config.php';
require 'usuarios.class.php';

$c = new Usuarios();
if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $c->cadastrar($nome, $email, $senha);

    header("Location: index.php");
}
?>
<form action="" method="POST">
    Nome:<br/>
    <input type="text" name="nome" required><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" required><br/><br/>
    Senha:<br/>
    <input type="password" name="senha" required><br/><br/>   
    <input type="submit" value="Cadastrar">
</form>