<?php
// Inicia a sessão
session_start();
global $pdo; // Define uma variável global $pdo para a conexão com o banco de dados

    // Cria uma nova instância da classe PDO para se conectar ao banco de dados
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=dbprojeto', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // aq define o modo de erro para EXCEPTION, o que significa que o PDO lançará exceções em caso de erros
    }catch(PDOException $e){
        echo "ERRO na conexão com o banco de dados: ".     //imprime uma mensagem de erro
        $e->getMessage();
    }
?>
