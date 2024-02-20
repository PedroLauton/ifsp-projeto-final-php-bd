<?php
    require_once "../../includes/config.php";

    $codigo = $_GET['txtid'];
    $nome = $_GET['txtNome'];
    $telefone = $_GET['txtTelefone'];
    $email = $_GET['txtEmail'];
    $senha = $_GET['txtSenha'];
    $cargo = $_GET['txtCargo'];

    $altera = $pdo->prepare('UPDATE funcionarios SET Nome = :nome, Telefone = :telefone, Email = :email, Senha = :senha, Cargo = :cargo WHERE Id = :cod');

    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':nome', $nome);
    $altera->bindValue(':telefone', $telefone);
    $altera->bindValue(':email', $email);
    $altera->bindValue(':senha', $senha);
    $altera->bindValue(':cargo', $cargo);
    $altera->execute();
    header("Location: funcionarios.php");
?>