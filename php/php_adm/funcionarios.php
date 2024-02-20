<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-funcionarios.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Funcionários</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <?php
            //Consulta ao banco de dados para pegar os funcionários e exibir em tela
            $consultaFuncionarios = $pdo->prepare('SELECT * FROM funcionarios');
            $consultaFuncionarios->execute();

            if ($consultaFuncionarios->rowCount() > 0) {
        ?>
        <h1>Funcionários</h1>
        <div class="container">
            <form action="consultar_funcionarios.php">
                <a href="cadastrar_funcionarios.php" class="input_btn">Cadastro</a>
                <input type="text" name="buscar" class="container buscar" placeholder="Buscar">
                <button type="submit" id="btn"><img src="../../img/pesquisar.png" alt="Editar"></button>
            </form>
        </div>
        <?php
            while ($linhaFuncionario = $consultaFuncionarios->fetch(PDO::FETCH_ASSOC)):
        ?>
        <table>
            <tr>
                <th>ID
                    <br><input type="text" name="txtid" disabled value="<?= $linhaFuncionario['Id']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linhaFuncionario['Nome']; ?>">
                </th>   
                <th>Telefone
                    <br><input type="text" name="txtnome" disabled value="<?= $linhaFuncionario['Telefone']; ?>">
                </th>              
                <th>Email
                     <br><input type="text" name="txtemail" disabled value="<?= $linhaFuncionario['Email']; ?>">
                </th>                
                <th>Senha
                    <br><input type="text" name="txtsenha" disabled value="<?= $linhaFuncionario['Senha']; ?>">
                </th>
                <th>Cargo
                    <br><input type="text" name="txtendereco" disabled value="<?= $linhaFuncionario['Cargo']; ?>">
                </th>
                <th>
                    <a href="editar_funcionarios.php?id=<?= $linhaFuncionario['Id']; ?>"><img src="../../img/editar.png" alt="Editar"></a>
                    <a href="excluir_funcionarios.php?id=<?= $linhaFuncionario['Id']; ?>"><img src="../../img/excluir.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; } else { ?>
        <h1>Não há funcionários disponíveis.</h1>
        <a href="inicio.php"><button type="submit" class="input_btn">Voltar</button></a>
        <br>
        <a href="cadastrar_funcionarios.php" class="input_btn">Cadastro</a>
        <?php }?>
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
