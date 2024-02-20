<?php
    require_once '../../includes/config.php';

    session_start();
    // Verifica se o formulário foi submetido
    if (isset($_POST['btncadastrar'])) {
    //  processa os dados do form

        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'txtnome')));
        $telefone = filter_input(INPUT_POST, 'txtelefone');
        $email = filter_input(INPUT_POST, 'txtemail');
        // Prepara para inserir dados na tabela 

        $cadastrar = $pdo->prepare("INSERT into fornecedores (NomeFornecedor, Telefone, EmailFornecedor) VALUES (:nome, :telefone, :email)");

         // Vincula os valores aos parâmetros da declaração preparada
        $cadastrar->bindValue(':nome', $nome);
        $cadastrar->bindValue(':telefone', $email);
        $cadastrar->bindValue(':email', $email);
        $cadastrar->execute();

        header('Location: fornecedores.php');
        exit(); 
    }
?>