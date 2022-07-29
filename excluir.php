<?php
require 'config.php';
require 'usuarios.class.php';

$d = new Usuarios();
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $d->excluir($id);

    header("Location: index.php");
}
?>