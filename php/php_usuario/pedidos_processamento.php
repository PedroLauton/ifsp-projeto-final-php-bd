<?php
// Inclui o arquivo de verificação para garantir que o usuário esteja autenticado
require '../../includes/verifica.php';

// Inicializa a sessão
session_start();

// Limpa a variável de sessão 'itens', para zerar o carrinho
$_SESSION['itens'] = array();

// Função para gerar um número aleatório de pedido
function gerarNumeroAleatorio()
{
    $prefixo = "PE";
    $numeroAleatorio = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    $numeroFormatado = $prefixo . $numeroAleatorio;

    return $numeroFormatado;
}

// Gera um número aleatório para o pedido
$numeroGerado = gerarNumeroAleatorio();

// Verifica se a variável de sessão 'dados' não está vazia
if (!empty($_SESSION['dados'])) {
    // Obtém o primeiro item dos 'dados'
    $primeiroItem = reset($_SESSION['dados']);
    $clienteId = $primeiroItem['ClienteId'];

    // Insere um novo registro na tabela 'pedidos' para representar o pedido
    $inserirPedido = $pdo->prepare("INSERT INTO pedidos (ClienteId, CodigoPedido) VALUES (?, ?)");
    $inserirPedido->bindParam(1, $clienteId);
    $inserirPedido->bindParam(2, $numeroGerado);
    $inserirPedido->execute();

    // Recupera o ID do pedido que acabou de ser inserido
    $pedidoId = $pdo->lastInsertId();

    // Loop sobre os produtos no carrinho (dados) e insere cada um na tabela 'itens_pedido'
    foreach ($_SESSION['dados'] as $produtos) {
        $inserir = $pdo->prepare("INSERT INTO itens_pedido (PedidoId, ProdutoId, Nome, Imagem, Quantidade, Preco, Total, CodigoPedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $inserir->bindParam(1, $pedidoId);
        $inserir->bindParam(2, $produtos['ProdutoId']);
        $inserir->bindParam(3, $produtos['Nome']);
        $inserir->bindParam(4, $produtos['Imagem']);
        $inserir->bindParam(5, $produtos['Quantidade']);
        $inserir->bindParam(6, $produtos['Preço']);
        $inserir->bindParam(7, $produtos['Total']);
        $inserir->bindParam(8, $numeroGerado);
        $inserir->execute();

        // Redireciona para a página de pedidos após a inserção dos itens
        header("Location: pedidos.php");
    }
} else {
    // Se o carrinho estiver vazio, exibe uma mensagem
    echo "O carrinho está vazio.";
}
?>
