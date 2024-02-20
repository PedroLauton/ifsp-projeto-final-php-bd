<?php
    require_once '../../includes/config.php';

    session_start();

    if (isset($_POST['btncadastrar'])) {
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'txtnome')));
        $telefone = filter_input(INPUT_POST, 'txtelefone');
        $email = filter_input(INPUT_POST, 'txtemail');
        $senha = filter_input(INPUT_POST, 'txtsenha');
        $cargo = filter_input(INPUT_POST, 'txtcargo');


        $cadastrar = $pdo->prepare("INSERT into funcionarios (Nome, Telefone, Email,Senha,Cargo) VALUES (:nome, :telefone, :email,:senha,:cargo)");
        $cadastrar->bindValue(':nome', $nome);
        $cadastrar->bindValue(':telefone', $telefone);
        $cadastrar->bindValue(':email', $email);
        $cadastrar->bindValue(':senha', $senha);
        $cadastrar->bindValue(':cargo', $cargo);

        $cadastrar->execute();

        header('Location: funcionarios.php');
        exit(); 
    }
?>