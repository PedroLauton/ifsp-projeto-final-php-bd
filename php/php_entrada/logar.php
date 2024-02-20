<?php
    // Verifica se as variáveis do formulário foram enviadas e não estão vazias
    if (isset($_POST['txtemail']) && !empty($_POST['txtemail']) && isset($_POST['txtsenha']) && !empty($_POST['txtsenha'])) {
        // Inclui os arquivos de configuração e a definição da classe Usuario
        require '../../includes/config.php';
        require '../../includes/Usuario.class.php';

        // Pega os valores do formulário 
        $email = $_POST['txtemail'];
        $senha = $_POST['txtsenha'];

        // instânciando nosso objeto, tudo q chamar nessa variavel u, ele vai buscar na classe Usuario.class
        $u = new Usuario();

        // Verifica se o login é bem-sucedido
        if ($u->login($email, $senha)) {
            // Redireciona de acordo com o tipo de usuário
            if ($_SESSION['tipo_usuario'] == 'cliente') {
                header("Location: ../php_usuario/shop.php");
            } elseif ($_SESSION['tipo_usuario'] == 'administrador') {
                header("Location: ../php_adm/inicio.php");
            }
            exit();
        }else {
            $_SESSION['erro_login']++;
            header("Location: login.php");
            //então caso der errado, redireciona para tela de login
        }
    } 
?>
