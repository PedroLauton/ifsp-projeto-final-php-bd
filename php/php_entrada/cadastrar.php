<?php
    require_once '../../includes/config.php';

    session_start();

    if (isset($_POST['btncadastrar'])) {
        //Função para deixar os nomes com a primeira letra maiuscula
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'txtnome')));
        $email = filter_input(INPUT_POST, 'txtemail');

        //Verifica se o email cadastrado já existe no banco de dados
        $select = $pdo->prepare("SELECT Email FROM clientes WHERE Email = :email");
        $select->bindValue(':email', $email);
        $select->execute();

        //Se existir, incrementa a session e retorna para a pagina de cadastro
        if ($select->rowCount() > 0) {
            $_SESSION['erro_cadastro']++;
            header("Location: cadastro.php");
            exit(); 
        }

        //Caso não, salva as informações no banco de dados
        $senha = filter_input(INPUT_POST, 'txtsenha');
        $endereco = filter_input(INPUT_POST, 'txtendereco');

        $cadastrar = $pdo->prepare("INSERT into clientes (Nome, Email, Senha, Endereco) VALUES (:nome, :email, :senha, :endereco)");
        $cadastrar->bindValue(':nome', $nome);
        $cadastrar->bindValue(':email', $email);
        $cadastrar->bindValue(':senha', $senha);
        $cadastrar->bindValue(':endereco', $endereco);
        $cadastrar->execute();

        header('Location: login.php');
        exit(); 
    }
?>
