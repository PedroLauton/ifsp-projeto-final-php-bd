<?php
    //Inclusão do arquivo de verificação.
    require '../../includes/verifica.php';

    if (isset($_SESSION['idcli']) && !empty($_SESSION['idcli'])):

        $codigoUsuario = $_SESSION['idcli'];
        //Realiza uma consulta no banco de dados para exibir o cliente e poder editar os seus dados, tudo isso com base no ID
        $consultaUsuario = $pdo->prepare('SELECT * FROM clientes WHERE ClienteId = :code');
        $consultaUsuario->bindValue(':code', $codigoUsuario);
        $consultaUsuario->execute();
        $linhaUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_usuario/css-dados.css">
    <link rel="icon" href="../../qimg/logo.png">
    <title>Açougu-E - Dados</title>
</head>
<body>
    <?php include_once "nav_usuario.php"; ?>
    <main>
        <div class="formulario">
            <h1>Dados</h1>
            <form action="dados_action.php" method="post">
                <input type="hidden" name="txtid" value="<?php echo $linhaUsuario['ClienteId']; ?>">
                <div class="formulario_campos">
                    <label for="nome">Nome: </label><br>
                    <input type="text" name="txtnome" id="nome" value="<?php echo $linhaUsuario['Nome']; ?>" required>
                </div>
                <div class="formulario_campos">
                    <label for="email">Email: </label><br>
                    <input type="email" name="txtemail" id="email" value="<?php echo $linhaUsuario['Email']; ?>" required>
                </div>
                <div class="formulario_campos">
                    <label for="senha">Senha: </label><br>
                    <input type="text" name="txtsenha" id="senha" required value="<?php echo $linhaUsuario['Senha']; ?>" required>
                </div>
                <div class="formulario_campos">
                    <label for="endereco">Endereço: </label><br>
                    <input type="text" name="txtendereco" id="endereco" value="<?php echo $linhaUsuario['Endereco']; ?>" required>
                </div>
                <br>
                <button type="submit" class="btn" name="btnalterar"><b>Salvar</b></button>
            </form>
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