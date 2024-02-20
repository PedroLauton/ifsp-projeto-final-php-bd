<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_usuario/css-nav_usuario.css">
</head>
<body>
    <nav>
        <div class="nav">
            <a href="../../index.php"><img src="../../img/logo.png" alt="Logo Açougu-E"></a>
            <p id="nav_usuario"><?php echo $nomeUsu; ?><img src="../../img/logo_usuario.png" alt="Logo usuário" id="nav_menu_li_img"></p>
            <ul class="nav_menu">
                <li><a href="../../php/php_usuario/dados.php" class="nav_menu_li">Dados</a></li>
                <li><a href="../../php/php_usuario/shop.php" class="nav_menu_li">Compras</a></li>
                <li><a href="../../php/php_usuario/carrinho.php" class="nav_menu_li">Carrinho</a></li>
                <li><a href="../../php/php_usuario/pedidos.php" class="nav_menu_li">Pedidos</a></li>
                <li><a href="../../includes/sair.php" class="nav_menu_li">Sair</a></li>
            </ul>
            <div class="nav-icon">&#9776;</div>
        </div>
    </nav>
<body>
</html>