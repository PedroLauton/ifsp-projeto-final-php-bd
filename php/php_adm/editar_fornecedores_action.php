<?php
    require_once "../../includes/config.php";

    $codigo = $_GET['txtid'];
    $nome = $_GET['txtNome'];
    $telefone = $_GET['txtTelefone'];
    $email = $_GET['txtEmail'];

    $altera = $pdo->prepare('UPDATE fornecedores SET NomeFornecedor = :nome, Telefone = :telefone, EmailFornecedor = :email WHERE FornecedorId = :cod');

    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':nome', $nome);
    $altera->bindValue(':telefone', $telefone);
    $altera->bindValue(':email', $email);
    $altera->execute();
    header("Location: fornecedores.php");

?>