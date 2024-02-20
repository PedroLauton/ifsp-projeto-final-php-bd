<?php
    require_once '../../includes/verifica.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-nav_adm.css">
</head>
<body>
    <nav>
        <div class="nav">
            <a href="inicio.php"><img src="../../img/logo.png" alt="Logo Açougu-E"></a>
            <p id="nav_usuario"><?php  echo $nomeUsu; ?><img src="../../img/logo_usuario.png" alt="Logo usuário" id="nav_menu_li_img"></p>
            <ul class="nav_menu">
                <li><a href="../../php/php_adm/clientes.php" class="nav_menu_li">Clientes</a></li>
                <li><a href="../../php/php_adm/funcionarios.php" class="nav_menu_li">Funcionários</a></li>
                <li><a href="../../php/php_adm/fornecedores.php" class="nav_menu_li">Fornecedores</a></li>
                <li><a href="../../php/php_adm/pedidos.php" class="nav_menu_li">Pedidos</a></li>
                <li><a href="../../includes/sair.php" class="nav_menu_li">Sair</a></li>
            </ul>
            <div class="nav-icon">&#9776;</div>
        </div>
    </nav>
<body>
</html>
