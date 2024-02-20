<?php
    require_once "../../includes/config.php";

    $codigo = $_GET['txtid'];

    $exclui = $pdo->prepare('DELETE FROM itens_pedido WHERE PedidoId = :id');
    $exclui->bindValue(':id', $codigo);
    $exclui->execute();

    $exclui = $pdo->prepare('DELETE FROM pedidos WHERE PedidoId = :id');
    $exclui->bindValue(':id', $codigo);
    $exclui->execute();
    header('Location: pedidos.php');
?>
