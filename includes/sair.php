<?php
// Inicia a sessão pra destruir ela dps
session_start();

// Remove a variável de sessão 'idcli', desvinculando da sessão atual
unset($_SESSION['idcli']);
unset($_SESSION['id_admin']);

session_destroy();

// Redireciona o usuário para a página inicial (index.php) após sairr
header("Location: ../index.php");
?>