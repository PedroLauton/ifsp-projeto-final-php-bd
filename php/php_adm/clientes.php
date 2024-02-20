<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-clientes.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Clientes</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <?php
            //Consulta o banco de dados
            $consultaClientes = $pdo->prepare('SELECT * FROM clientes');
            $consultaClientes->execute();

            //Caso tenha clientes, roda o if e exibe os clientes
            if ($consultaClientes->rowCount() > 0) {
        ?>
        <h1>Clientes</h1>
        <div class="container">
            <form action="consultar_cliente.php">
                <input type="text" name="buscar" class="container buscar" placeholder="Buscar">
                <button type="submit" id="btn"><img src="../../img/pesquisar.png" alt="Editar"></button>
            </form>
        </div>
        <?php
            while ($linhaCliente = $consultaClientes->fetch(PDO::FETCH_ASSOC)):
        ?>
        <table>
            <tr>
                <th>ID
                    <br><input type="text" name="txtid" disabled value="<?= $linhaCliente['ClienteId']; ?>">
                </th>
                <th>Nome
                    <br><input type="text" name="txtnome" disabled value="<?= $linhaCliente['Nome']; ?>">
                </th>                
                <th>Email
                    <br><input type="text" name="txtemail" disabled value="<?= $linhaCliente['Email']; ?>">
                </th>                
                <th>Senha
                    <br><input type="text" name="txtsenha" disabled value="<?= $linhaCliente['Senha']; ?>">
                </th>
                <th>Endereço
                    <br><input type="text" name="txtendereco" disabled value="<?= $linhaCliente['Endereco']; ?>">
                </th>                    
                <th>
                    <a href="editar_cliente.php?id=<?= $linhaCliente['ClienteId']; ?>"><img src="../../img/editar.png" alt="Editar"></a>
                    <a href="excluir_cliente.php?id=<?= $linhaCliente['ClienteId']; ?>"><img src="../../img/excluir.png" alt="Editar"></a>
                </th>
            </tr>
        </table>
        <?php endwhile; } else { ?>
        <!--Caso não tenha clientes, exibe a seguinte mensagem-->
        <h1>Não há clientes disponíveis.</h1>
        <a href="inicio.php"><button type="submit" class="input_btn">Voltar</button></a>
        <?php } ?>
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
