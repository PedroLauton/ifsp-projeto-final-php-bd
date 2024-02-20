<?php
    require_once "../../includes/config.php";

    $codigo = $_GET['txtid'];

    $exclui = $pdo->prepare('DELETE FROM funcionarios WHERE Id = :id');
    $exclui->bindValue(':id', $codigo);
    $exclui->execute();
    header('Location: funcionarios.php');
?>
