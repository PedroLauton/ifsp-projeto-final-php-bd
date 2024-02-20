<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):

    // Verificar se a busca foi acionada
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['buscar'])) {
        $buscar = '%' . $_GET['buscar'] . '%';
        $sql = "SELECT * FROM funcionarios WHERE Nome LIKE :buscar";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':buscar', $buscar, PDO::PARAM_STR);
        $consulta->execute();
    } else {
        // Se não houver busca, exibe todos os clientes
        $consulta = $pdo->prepare('SELECT * FROM funcionarios');
        $consulta->execute();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-consultar_funcionarios.css">
    <link rel="icon" href="../../img/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Açougu-E - Funcionários</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Funcionários</h1>
        <div class="container">
            <form action="consultar_funcionarios.php" method="get">
                <a href="cadastrar_funcionarios.php" class="input_btn">Cadastro</a>
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
                    <br><input type="text" name="txtid" disabled value="<?= $linha['Id']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Nome']; ?>">
                </th>   
                <th>Telefone
                    <br><input type="text" name="txtnome" disabled value="<?= $linha['Telefone']; ?>">
                </th>              
                <th>Email
                    <br><input type="text" name="txtemail" disabled value="<?= $linha['Email']; ?>">
                </th>                
                <th>Senha
                    <br><input type="text" name="txtsenha" disabled value="<?= $linha['Senha']; ?>">
                </th>
                <th>Cargo
                    <br><input type="text" name="txtendereco" disabled value="<?= $linha['Cargo']; ?>">
                </th>                    
                <th>
                    <a href="editar_funcionarios.php?id=<?= $linha['Id']; ?>"><img src="../../img/editar.png" alt="Editar"></a>
                    <a href="excluir_funcionarios.php?id=<?= $linha['Id']; ?>"><img src="../../img/excluir.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; ?>
        <a href="funcionarios.php"><button type="submit" class="input_btn">Voltar</button></a>
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
