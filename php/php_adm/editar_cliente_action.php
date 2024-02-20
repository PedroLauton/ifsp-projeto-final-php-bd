<?php
    require_once "../../includes/config.php";

    $codigo = $_GET['txtid'];
    $nome = $_GET['txtNome'];
    $email = $_GET['txtEmail'];
    $senha = $_GET['txtSenha'];
    $endereco = $_GET['txtEndereco'];

    $altera = $pdo->prepare('UPDATE clientes SET Nome = :nome, Email = :email, Senha = :senha, Endereco = :endereco WHERE ClienteId = :cod');

    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':nome', $nome);
    $altera->bindValue(':email', $email);
    $altera->bindValue(':senha', $senha);
    $altera->bindValue(':endereco', $endereco);
    $altera->execute();
    header("Location: clientes.php");
?>