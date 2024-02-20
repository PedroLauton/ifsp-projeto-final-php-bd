<?php
    //Inclusão do arquivo de verificação.
    require '../../includes/verifica.php';

    if (isset($_SESSION['idcli']) && !empty($_SESSION['idcli'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_usuario/css-shop.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Compras</title>
</head>
<body>
    <?php include_once "nav_usuario.php"; ?>
    <main>
        <div>
            <h1 id="titulo_cortes">Nossos cortes!</h1>
            <div id="centralizar">        
                <div class="container">                
                    <div class="container cortes">
                        <a href="../php_usuario/aves.php"><img src="../../img/aves.png" alt="Aves"></a>
                    </div>
                    <div class="container cortes">
                        <a href="../php_usuario/bovino.php"><img src="../../img/bovina.png" alt="Bovinos"></a>
                    </div>
                    <div class="container cortes">
                        <a href="../php_usuario/suino.php"><img src="../../img/suína.png" alt="Suínos"></a>
                    </div>
                    <div class="container cortes">
                        <a href="../php_usuario/frutos.php"><img src="../../img/frutos-do-mar.png" alt="Frutos do mar"></a>
                    </div>
                    <div class="container cortes">
                        <a href="../php_usuario/queijos.php"><img src="../../img/queijos.png" alt="Queijos"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="filiais">
            <h2 id="titulo">Conheça algumas das nossas lojas!</h2>      
            <section class="filiais img">
                <img src="../../img/filial_1.jpg" alt="Filial 1">
                <img src="../../img/filial_2.jpg" alt="Filial 2">
                <img src="../../img/filial_3.jpg" alt="Filial 3">
            </section>
        </div>
    </main>
    <?php include_once "footer_usuario.php"; ?>
    <script src="../../js/menu.js"></script>
</body>
</html>
<?php 
    else: 
        header("Location: ../../index.php");
        exit();
    endif;
?>