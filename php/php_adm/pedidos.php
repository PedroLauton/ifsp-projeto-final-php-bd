<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-pedidos.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Pedidos</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <?php
            //Consulta ao banco de dados para pegar os pedidos e exibir em tela
            $consulta = $pdo->prepare('SELECT * FROM pedidos');
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
        ?>
        <h1>Pedidos</h1>
        <div class="container">
            <form action="consultar_pedidos.php">
                <input type="text" name="buscar" class="container buscar" placeholder="Buscar">
                <button type="submit" id="btn"><img src="../../img/pesquisar.png" alt="Editar"></button>
            </form>
        </div>
        <?php
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
        ?>
        <table>
            <tr>
                <th>ID
                    <br><input type="text" name="txtid" disabled value="<?= $linha['PedidoId']; ?>">
                </th>
                <th>ID cliente 
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['ClienteId']; ?>">
                </th>   
                <th>Pedido
                    <br><input type="text" name="txtnome" disabled value="<?=$linha['CodigoPedido'];?>">
                </th>                             
                <th>                            
                    <a href="analizar_pedidos.php?id=<?=$linha['PedidoId'];?>&codigo=<?=$linha['CodigoPedido'];?>"><img src="../../img/olhar.png" alt="Editar"></a>
                    <a href="excluir_pedidos.php?id=<?= $linha['PedidoId']; ?>"><img src="../../img/excluir.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; } else { ?>
        <h1>Não há pedidos disponíveis.<h1>
        <a href="inicio.php"><button type="submit" class="input_btn">Voltar</button></a>
        <?php } ?>
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
