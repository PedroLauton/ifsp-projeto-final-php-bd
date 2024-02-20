<?php
    // Inclui o arquivo de verificação
    require '../../includes/verifica.php';

    // Verifica o login do usuário
    if (isset($_SESSION['idcli']) && !empty($_SESSION['idcli'])):
    
    // Verifica se a sessão de itens está criada. Caso não esteja, ela é criada. Essa sessão é usada para armazenar os itens do carrinho, por meio de um array.
    if (!isset($_SESSION['itens'])) {
        $_SESSION['itens'] = array();
    }

    // Verifica o id do produto passado para o carrinho, esse id é passado das páginas de aves, bovinos e etc...
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o ProdutoId está definido no POST
        if (isset($_POST['ProdutoId'])) {
            $idproduto = $_POST['ProdutoId'];
            $quantidadeNome = 'qtd' . $idproduto;
            $quantidade = isset($_POST[$quantidadeNome]) ? intval($_POST[$quantidadeNome]) : 1;    

            // Verifica se o produto já está no carrinho
            if (!isset($_SESSION['itens'][$idproduto])) {
                $_SESSION['itens'][$idproduto] = $quantidade;
            } else {
                $_SESSION['itens'][$idproduto] += $quantidade;
            }
        }

        // Remove um item do carrinho se a ação de remover estiver definida no POST
        if (isset($_POST['remover'])) {
            $idRemover = $_POST['remover'];
            if (isset($_SESSION['itens'][$idRemover])) {
                unset($_SESSION['itens'][$idRemover]);
            }
        }

        // Redireciona de volta para a mesma página após a manipulação do carrinho
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // Inicializa a variável $totalCarrinho
    $totalCarrinho = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_usuario/css-carrinho.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Carrinho</title>
</head>
<body>
    <?php include_once "nav_usuario.php"; ?> 
    <main>
        <div class="container">
            <h1 id="titulo_carrinho">Carrinho</h1>
            <form action="" method="post">
                <!-- se o array estiver vazio, exibi a seguinte mensagem -->
                <?php if (count($_SESSION['itens']) == 0): ?>
                    <h2>Sem itens no carrinho, volte para a página de compras!</h2><br><br>
                    <a href="shop.php" class="a_btn">Voltar</a>
                <?php else: ?>
                    <!-- Se há itens no carrinho, exibe a lista de produtos -->
                    <ul class="container produtos">
                        <?php
                            $_SESSION['dados'] = array();
                            
                            // Itera sobre os itens no carrinho
                            foreach ($_SESSION['itens'] as $idproduto => $quantidade){
                                // Consulta o banco de dados para obter informações do produto
                                $select = $pdo->prepare("SELECT * FROM estoque WHERE ProdutoId=?");
                                $select->bindParam(1, $idproduto);
                                $select->execute();
                                $produtos = $select->fetchAll();
                                
                                // Verifica se há informações válidas sobre o produto
                                if (!empty($produtos) && isset($produtos[0])) {
                                    $produto = $produtos[0];
                                    $precoTotalItem = $quantidade * $produto["PrecoUnitario"];
                        ?>
                        <!-- Exibe as informações do produto no carrinho -->
                        <li class="container produtos cartao">
                            <span><b><?= $produto["NomeProduto"] ?></b></span>
                            <img src="../../img/<?= $produto["fotoProduto"]; ?>" alt="corte">
                            <div>
                                <h2><?= $quantidade ?>kg</h2>
                                <h2><?= $quantidade ?> und.</h2>
                            </div>
                            <h1>Preço: R$<?= $produto["PrecoUnitario"] ?></h1>
                            <button type="submit" name="remover" value="<?= $idproduto ?>" class="btn-remover"><img src="../../img/excluir.png" alt="excluir"></button>
                        </li>
                        <?php
                            // Atualiza o total do carrinho e adiciona dados à sessão 'dados'
                            $totalCarrinho += $precoTotalItem;
                            //Array usado para colocar os dados do carrinho em um array e ser processado em pedidos.
                            array_push(
                                $_SESSION['dados'],
                                array(
                                    'ProdutoId' => $idproduto,
                                    'Nome' => $produto["NomeProduto"],
                                    'Imagem' =>  $produto["fotoProduto"],
                                    'Quantidade' =>  $quantidade,
                                    'Preço' => $produto["PrecoUnitario"],
                                    'Total' => $precoTotalItem,
                                    'ClienteId' => $_SESSION['idcli']
                                )
                                );
                                }
                            }
                        ?>
                    </ul>
                    <?php if ($totalCarrinho > 0): ?>
                        <!-- Se o total do carrinho é maior que zero, exibe o preço final e o botão para realizar pedido -->
                        <h1 id="preco_final">Preço final: R$<?= $totalCarrinho ?></h1>
                        <br>
                        <a href="pedidos_processamento.php" class="a_btn">Realizar pedido</a>
                    <?php endif; ?>
            </form>
            <br>
                <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><button class="a_btn">Adicionar Mais Itens</button></a>
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
