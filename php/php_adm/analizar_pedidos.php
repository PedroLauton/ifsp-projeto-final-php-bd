<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):

    $id = $_GET['id'];
    $codigo = $_GET['codigo'];
    // Prepara e executa a consulta SQL para obter itens do pedido

    $consulta = $pdo->prepare('SELECT * FROM itens_pedido WHERE PedidoId = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();

    $totalpedido = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-analizar_pedido.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Pedidos</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Pedido - <?= $codigo ?></h1>
        <?php
        // Itera sobre os resultados da consulta enqt houver registros

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
                $totalpedido += $linha['Total'];
        ?>
        <table>
            <tr>
                <th>ID pedido
                    <br><input type="text" name="txtid" disabled value="<?= $linha['PedidoId']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Nome']; ?>">
                </th>   
                <th>Quantidade
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Quantidade']; ?>">
                </th>
                <th>Kg
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Quantidade']; ?>">
                </th> 
                <th>Preço unitário
                    <br><input type="text" name="txtnome" disabled value="R$ <?= $linha['Preco']; ?>">
                </th>
                <th>Preço total
                    <br><input type="text" name="txtnome" disabled value="R$ <?= $linha['Total']; ?>">
                </th>                              
            </tr>
        </table>
        <?php endwhile; ?>
        <h2>Preço final: R$ <?php echo $totalpedido; ?></h2><br>
        <a href="pedidos.php"><button type="submit" class="input_btn">Voltar</button></a>
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
