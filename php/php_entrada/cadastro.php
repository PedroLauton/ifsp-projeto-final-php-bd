<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_entrada/css-cadastro_login.css">
    <link rel="icon" href="../../img/logo.png">
    <title>Açougu-E - Cadastro</title>
</head>
<body>
    <?php include_once "nav_entrada.php";?>
    <main>   
        <?php 
            session_start();

            // Inicializa a variável de erro se não estiver definida
            if (!isset($_SESSION['erro_cadastro'])) {
                $_SESSION['erro_cadastro'] = 0;
            }

            // Verifica se o erro_cadastro é maior ou igual a 1
            if ($_SESSION['erro_cadastro'] >= 1): ?>
        <!-- Se foi maior que 1, exibi a mensagem de erro -->
        <div class="erro">
            <div class="erro mensagem">
                <img src="../../img/atencao.png" alt="Atenção" id="erro_img">
                <p>Esse email já está sendo usado.</p>
            </div>
        </div>
        <?php endif; $_SESSION['erro_cadastro'] = 0; ?>
        <div class="formulario">
            <h1>Cadastro</h1>
            <form action="cadastrar.php" method="post">
                <div class="formulario_campos">
                    <label for="nome">Nome: </label><br>
                    <input type="text" name="txtnome" id="nome" required>
                </div>
                <div class="formulario_campos">
                    <label for="email">Email: </label><br>
                    <input type="email" name="txtemail" id="email" required>
                </div>
                <div class="formulario_campos">
                    <label for="Senha">Senha: </label><br>
                    <input type="password" name="txtsenha" required id="senha">
                </div>
                <div class="formulario_campos">
                    <label for="endereço">Endereço: </label><br>
                    <input type="text" name="txtendereco" required id="endereço">
                </div>
                <br><a href="login.php" id="login_retorno">Já tem cadastro?</a><br><br>
                <button type="submit" class="btn" name="btncadastrar"><b>Cadastrar</b></button>                             
            </form> 
        </div>
    </main>
    <?php include_once "footer_entrada.php"; ?>
    <script src="../../js/menu.js"></script>
</body>
</html>