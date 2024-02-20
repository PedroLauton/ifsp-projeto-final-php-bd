<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-fornecedores.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Fornecedores</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Fornecedores</h1>
        <div class="container">
            <form action="consultar_fornecedores.php">                
                <a href="cadastrar_fornecedores.php" class="input_btn">Cadastro</a>
                <input type="text" name="buscar" class="container buscar" placeholder="Buscar">
                <button type="submit" id="btn"><img src="../../img/pesquisar.png" alt="Editar"></button>
            </form>
        </div>
        <?php
            //Consulta ao banco de dados para pegar os fonecedores e exibir em tela
            $consulta = $pdo->prepare('SELECT * FROM fornecedores');
            $consulta->execute();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
        ?>
        <table>
            <tr>
                <th>ID
                    <br><input type="text" name="txtid" disabled value="<?= $linha['FornecedorId']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['NomeFornecedor']; ?>">
                </th>   
                <th>Telefone
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Telefone']; ?>">
                </th>              
                <th>Email
                    <br><input type="text" name="txtemail" disabled value="<?= $linha['EmailFornecedor']; ?>">
                </th>                
                <th>
                    <a href="editar_fornecedores.php?id=<?= $linha['FornecedorId']; ?>"><img src="../../img/editar.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; ?>
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

