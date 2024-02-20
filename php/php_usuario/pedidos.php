<?php
    require '../../includes/verifica.php';

    // Verifica se o usuário está autenticado
    if (isset($_SESSION['idcli']) && !empty($_SESSION['idcli'])):

    // Recupera o ID do cliente da sessão
    $clienteId = $_SESSION['idcli'];

    // Realiza a busca no banco de dados pelos pedidos do cliente
    $selectPedidos = $pdo->prepare("SELECT * FROM pedidos WHERE ClienteId = ?");
    $selectPedidos->bindParam(1, $clienteId);
    $selectPedidos->execute();
    $pedidos = $selectPedidos->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_usuario/css-pedidos.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Pedidos</title>
</head>
<body>
    <?php include_once "nav_usuario.php"; ?> 
    <main>
        <div class="container">        
            <h1 id="titulo_carrinho">Pedidos</h1>
            <?php
                if (!empty($pedidos)):
                    foreach ($pedidos as $pedido):
                        $codigoPedido = $pedido['CodigoPedido'];

                        // Realiza a busca no banco de dados pelos itens associados ao pedido
                        $selectItens = $pdo->prepare("SELECT * FROM itens_pedido WHERE CodigoPedido = ?");
                        $selectItens->bindParam(1, $codigoPedido);
                        $selectItens->execute();
                        $itensPedido = $selectItens->fetchAll(PDO::FETCH_ASSOC);
            ?>                        
            <span class="codigo-pedido"><b>Pedido: <?= $codigoPedido ?></b></span>
                <ul class="container produtos">
                    <li class="container produtos cartao">
                        <?php
                            //Caso tenha itens com o codigo do pedido, é exibido os itens.
                            if (!empty($itensPedido)):
                                $totalpedido = 0;
                                foreach ($itensPedido as $item):
                                $totalpedido += $item["Preco"] * $item['Quantidade'];
                        ?>
                        <div>
                            <div class="exibir_pedidos">
                                <h2><?= $item['Nome'] ?></h2>
                                <img src="../../img/<?= $item['Imagem'] ?>" alt="<?= $item['Nome'] ?>"/>
                                <h2>Quantidade e kg: <?= $item['Quantidade'] ?></h2>
                                <h1>Preço: R$<?= $item['Preco'] ?></h1>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <h2>Sem itens associados a este pedido.</h2>
                        <?php endif; ?>  
                    </li>
                    <h2 id="total_pedido">Preço total: R$<?= $totalpedido?></h2>
                </ul>
            <?php endforeach; ?>
            <a href="shop.php" class="a_btn">Voltar para Compras</a>
            <?php else: ?>
            <!-- Caso não tenha, aparece a seguinte mensagem -->
            <h2>Sem pedidos realizados.</h2><br><br>
            <a href="shop.php" class="a_btn">Voltar para Compras</a>
            <?php endif; ?>
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
