<?php
    require '../../includes/verifica.php';

    if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])):
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_adm/css-cadastro_funcionarios.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Cadastro</title>
</head>
<body>
    <?php include_once "nav_adm.php"; ?> 
    <main>   
        <div class="formulario">
            <h1>Cadastro de Funcionário</h1>
            <form action="cadastrar_funcionarios_action.php" method="post">
                <div class="formulario_campos">
                    <label for="nome">Nome: </label><br>
                    <input type="text" name="txtnome" id="nome" required>
                </div>
                <div class="formulario_campos">
                    <label for="telefone">Telefone: </label><br>
                    <input type="text" name="txtelefone" id="telefone" required>
                </div>
                <div class="formulario_campos">
                    <label for="email">Email: </label><br>
                    <input type="email" name="txtemail" id="email" required>
                </div>
                <div class="formulario_campos">
                    <label for="senha">Senha: </label><br>
                    <input type="text" name="txtsenha" id="senha" required>
                </div>
                <div class="formulario_campos">
                    <label for="cargo">Cargo: </label><br>
                    <input type="text" name="txtcargo" id="cargo" required>
                </div>
                <button type="submit" class="btn" name="btncadastrar"><b>Cadastrar</b></button>                             
            </form> 
        </div>
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