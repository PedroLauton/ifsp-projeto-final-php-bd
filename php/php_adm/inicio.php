<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-inicio.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Administrador</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <div class="container">        
            <ul class="container adm">
                <li class="container adm cartao"><a href="clientes.php" class="escolha">Clientes</a></li>
            </ul>
            <ul class="container adm">
                <li class="container adm cartao"><a href="funcionarios.php" class="escolha">Funcionários</a></li>
            </ul>
            <ul class="container adm">
                <li class="container adm cartao"><a href="fornecedores.php" class="escolha">Fornecedores</a></li>
            </ul>
            <ul class="container adm">
                <li class="container adm cartao"><a href="pedidos.php" class="escolha">Pedidos</a></li>
            </ul>
        </div>
    </main>
    <?php include_once "footer_adm.php"; ?>
    <script src="../../js/menu.js"></script>
</body>
</html>
<?php 
    else: 
        header("Location: ../../index.php");
        exit();
    endif;
?>