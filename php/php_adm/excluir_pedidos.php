<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):

    $id = $_GET['id'];
    //Consulta ao banco de dados para pegar os pedidos e exibir em tela
    $consulta = $pdo->prepare('SELECT * FROM pedidos WHERE PedidoId = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();

    $linha = $consulta->fetch(PDO::FETCH_ASSOC);

    $clienteid = $linha['ClienteId'];
    $codigopedido = $linha['CodigoPedido'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-excluir_pedidos.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Excluir</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Excluir pedido</h1>
        <table>
            <form action="excluir_pedido_action.php" method="get">
                <tr>
                    <th>ID
                        <br><input type="text" name="txtid" value="<?php echo "$id"; ?>" readonly>
                    </th>
                    <th>ID cliente
                        <br><input type="text" name="txtNome" value="<?php echo "$clienteid"; ?>" disabled>
                    </th>
                    <th>Pedido
                        <br><input type="text" name="txtTelefone" value="<?php echo "$codigopedido"; ?>" disabled>
                    </th>                                  
                    <th>
                        <button type="submit" class="input_btn">Excluir</button>
                    </th>
                </tr>
            </form>
        </table>        
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