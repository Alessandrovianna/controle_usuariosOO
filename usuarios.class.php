<?php
class Usuarios {
    public function selecionarTudo() {
        global $pdo;
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $usuario) {
                echo '<tr>';
                echo '<td>'.$usuario["nome"].'</td>';
                echo '<td>'.$usuario["email"].'</td>';
                echo '<td>
                        <a href="editar.php?id='.$usuario['id'].'">Editar</a>
                        <a href="excluir.php?id='.$usuario['id'].'">Excluir</a>
                      </td>';
                echo '</tr>';
            }
        }
    }
    public function cadastrar($nome, $email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0){
            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', md5($senha));
            $sql->execute();

            return true;
        } else {
            echo "Esse usuário já EXISTE";
        }
    }
    public function excluir($id) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }
    public function selecionarEditar($id) {
        global $pdo;
        global $dado;

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
        } else {
            header("Location: index.php");
        }
    }
    public function editar($nome, $email, $id) {
        global $pdo;
        $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':id', $id);
        $sql->execute();
 
    }
    public function verificarLogin() {
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        
        } else{
            header("Location: login.php");
        }
    }
    public function login($email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];
 
            header("Location: index.php");
         }
     }
}