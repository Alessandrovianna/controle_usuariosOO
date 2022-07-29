<?php
session_start();
require 'config.php';
require 'usuarios.class.php';

$l = new Usuarios();
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $l->login($email, $senha);
}
?>
<form action="" method="POST">
    E-mail:<br/>
    <input type="email" name="email" required><br/><br/>
    Senha:<br/>
    <input type="password" name="senha" required><br/><br/>   
    <input type="submit" value="Entrar">
</form>