<?php
    require_once "../../includes/config.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnalterar'])) {
        $codigoUsuario = $_POST['txtid'];
        $nome = $_POST['txtnome'];
        $email = $_POST['txtemail'];
        $senha = $_POST['txtsenha'];
        $endereco = $_POST['txtendereco'];

        $atualizaUsuario = $pdo->prepare('UPDATE clientes SET Nome = :nome, Email = :email, Senha = :senha, Endereco = :endereco WHERE ClienteId = :id');
        $atualizaUsuario->bindValue(':id', $codigoUsuario);
        $atualizaUsuario->bindValue(':nome', $nome);
        $atualizaUsuario->bindValue(':email', $email);
        $atualizaUsuario->bindValue(':senha', $senha);
        $atualizaUsuario->bindValue(':endereco', $endereco);
        $atualizaUsuario->execute();

        // Redireciona para a página de dados após a alteração
        header("Location: shop.php");
        exit();
    } else {
        // Redireciona se tentar acessar diretamente sem submissão do formulário
        header("Location: ../../index.php");
        exit();
    }
?>