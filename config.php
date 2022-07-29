<?php
try {
    global $pdo;
    $pdo = new PDO("mysql:dbname=controle_usuarios;host=localhost", "root", "P63H65P");

} catch(PDOException $e) {
    echo "FALHOU: ".$e->getMessage();
    exit;
}

?>