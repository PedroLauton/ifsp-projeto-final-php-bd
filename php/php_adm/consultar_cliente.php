<?php
//logica p buscar
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):

    // Verificar se a busca foi acionada
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['buscar'])) {
        $buscar = '%' . $_GET['buscar'] . '%';
        $sql = "SELECT * FROM clientes WHERE Nome LIKE :buscar";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':buscar', $buscar, PDO::PARAM_STR);
        $consulta->execute();
    } else {
        // Se não houver busca, exibe todos os clientes
        $consulta = $pdo->prepare('SELECT * FROM clientes');
        $consulta->execute();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-consultar_clientes.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Clientes</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Clientes</h1>
        <div class="container">
            <form action="consultar_cliente.php" method="get">
                <input type="text" name="buscar" class="container buscar" placeholder="Buscar">
                <button type="submit" id="btn"><img src="../../img/pesquisar.png" alt="Pesquisar"></button>
            </form>
        </div>
        <?php
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
        ?>
        <table>
            <tr>
                <th>ID
                    <br><input type="text" name="txtid" disabled value="<?= $linha['ClienteId']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Nome']; ?>">
                </th>                
                <th>Email
                    <br><input type="text" name="txtemail" disabled value="<?= $linha['Email']; ?>">
                </th>                
                <th>Senha
                    <br><input type="text" name="txtsenha" disabled value="<?= $linha['Senha']; ?>">
                </th>
                <th>Endereço
                    <br><input type="text" name="txtendereco" disabled value="<?= $linha['Endereco']; ?>">
                </th>                   
                <th>
                    <a href="editar_cliente.php?id=<?= $linha['ClienteId']; ?>"><img src="../../img/editar.png" alt="Editar"></a>
                    <a href="excluir_cliente.php?id=<?= $linha['ClienteId']; ?>"><img src="../../img/excluir.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; ?>
        <a href="clientes.php"><button type="submit" class="input_btn">Voltar</button></a>
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
