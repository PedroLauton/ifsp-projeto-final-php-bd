<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):

    $id = $_GET['id'];
    //Consulta ao banco de dados para pegar os funcionários e exibir em tela
    $consulta = $pdo->prepare('SELECT * FROM funcionarios WHERE Id = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();

    $linha = $consulta->fetch(PDO::FETCH_ASSOC);

    $nome = $linha['Nome'];
    $telefone = $linha['Telefone'];
    $email = $linha['Email'];
    $senha = $linha['Senha'];
    $cargo = $linha['Cargo'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-editar_funcionarios.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Editar</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>
        <h1>Editar funcionário</h1>
        <table>
            <form action="editar_funcionario_action.php">
                <tr>
                    <th>ID
                        <br><input type="text" name="txtid" value="<?php echo "$id"; ?>" readonly>
                    </th>
                    <th>Nome
                        <br><input type="text" name="txtNome" value="<?php echo "$nome"; ?>">
                    </th> 
                    <th>Telefone
                        <br><input type="text" name="txtTelefone" value="<?php echo "$telefone"; ?>">
                    </th>                
                    <th>Email
                        <br><input type="text" name="txtEmail" value="<?php echo "$email"; ?>">
                    </th>                
                    <th>Senha
                        <br><input type="text" name="txtSenha" value="<?php echo "$senha"; ?>">
                    </th>
                    <th>Cargo
                        <br><input type="text" name="txtCargo" value="<?php echo "$cargo"; ?>">
                    </th>                
                    <th>
                        <button type="submit" class="input_btn">Salvar</button>
                    </th>
                </tr>
            </form>
        </table>        
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