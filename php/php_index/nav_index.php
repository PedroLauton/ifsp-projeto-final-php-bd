<?php
    session_start();

    // Verifica se a variável de sessão 'idcli' está definida
    if (isset($_SESSION['idcli'])) {
        // Usuário autenticado - exibe "Comprar"
        $ExibirComprar = "Comprar";
        $LinkURLComprar = "./php/php_usuario/shop.php"; 
        $ExibirCadastro = ""; // Deixa vazio para não exibir
        $LinkURLCadastro = ""; // Deixa vazio para não exibir
        $ClasseCadastro = "desativado"; // Adiciona uma classe para desativar o estilo
    } else {
        // Usuário não autenticado - exibe "Login"
        $ExibirComprar = "Login";
        $LinkURLComprar = "./php/php_entrada/login.php"; 
        $ExibirCadastro = "Cadastro";
        $LinkURLCadastro = "./php/php_entrada/cadastro.php";
        $ClasseCadastro = ""; // Deixa vazio para manter o estilo normal
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/css_entrada/css-nav_entrada_index.css">
</head>
<body>
    <nav class="nav">
        <a href="index.php"><img src="./img/logo.png" alt="Logo Açougu-E"></a>
        <ul class="nav_menu">
            <li><a href="<?php echo $LinkURLComprar; ?>"><?php echo $ExibirComprar; ?></a></li>
            <li class="<?php echo $ClasseCadastro; ?>"><a href="<?php echo $LinkURLCadastro; ?>"><?php echo $ExibirCadastro; ?></a></li>
        </ul>
        <div class="nav-icon">&#9776;</div>
    </nav>
</body>
</html>
