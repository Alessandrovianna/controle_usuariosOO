<?php
require 'config.php';
require 'usuarios.class.php';

$e = new Usuarios();
$id = 0;
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $e->editar($nome, $email, $id);

    header("Location: index.php");
}

$s = new Usuarios();
$s->selecionarEditar($id);
?>

<form action="" method="POST">
    Nome:<br/>
    <input type="text" name="nome" value="<?php echo $dado['nome']; ?>"><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" value="<?php echo $dado['email']; ?>"><br/><br/>
    <input type="submit" value="Atualizar">
</form>