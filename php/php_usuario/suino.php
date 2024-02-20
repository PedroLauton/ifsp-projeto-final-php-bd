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
    <link rel="stylesheet" href="../../style/css_usuario/css-suino.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Suíno</title>
</head>
<body>
    <?php include_once "nav_usuario.php"; ?>
    <main>
        <div class="container">
            <h1 id="titulo_cortes">Súinos</h1>
            <ul class="container produtos">
                <?php
                    //Consulta ao banco de dados para pegar os dados e exibir em tela
                    $select = $pdo->prepare("SELECT * FROM estoque");
                    $select->execute();
                    $fetch = $select->fetchAll();
                    $contador = 0;
                    $aux = 1;

                    //Foreach para passar os IDs que já foram exibidos em outras páginas
                    foreach ($fetch as $produto):
                        if ($contador <= 9) {
                            $contador++;
                            continue;
                        }
                ?>
                <li class="container produtos cartao">
                    <span><b><?= $produto["NomeProduto"] ?></b></span>
                    <img src="../../img/corte<?= $aux ?>_suinos.png" alt="Cortes frango"/>
                    <section class="container produtos cartao descricao">
                        <h1>Preço:<br>R$<?= $produto["PrecoUnitario"] ?></h1>
                        <h2>1kg</h2>
                    </section>
                    <hr>
                    <form action="carrinho.php" class="container produtos cartao descricao" method="post">
                        <div>
                            <input type="hidden" name="ProdutoId" value="<?= $produto["ProdutoId"] ?>">
                            <button type="button" class="input_descricao_btn" onclick="decrement(this, 'qtd<?= $produto["ProdutoId"] ?>')">-</button>
                            <input type="number" value="1" min="1" max="99" id="input_descricao_qtd" name="qtd<?= $produto["ProdutoId"] ?>" readonly>
                            <button type="button" class="input_descricao_btn" onclick="increment(this, 'qtd<?= $produto["ProdutoId"] ?>')">+</button>
                        </div>
                        <button type="submit" id="input_descricao_sub">Adicionar</button>
                    </form>
                </li>
                <?php
                    $contador++;
                    $aux++;
                    if ($contador > 14) {
                        break;                      
                        //Limitador para exibir somente os produtos de uma sessão (os produtos são exibidos com base no ID do banco de dados).
                    }
                    endforeach;
                ?>
            </ul>
            <a href="shop.php" class="a_btn">Voltar</a>
        </div>
    </main>
    <?php include_once "footer_usuario.php"; ?>
    <script src="../../js/menu.js"></script>
    <script src="../../js/quantidade.js"></script>
</body>
</html>
<?php 
    else: 
        header("Location: ../../index.php");
        exit();
    endif;
?>

