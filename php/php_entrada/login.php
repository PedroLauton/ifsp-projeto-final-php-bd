<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/css_entrada/css-cadastro_login.css">
    <link rel="icon" href="../../img/logo.png">    
    <title>Açougu-E - Login</title>
</head>
<body>
    <?php
        session_start();
        include_once "nav_entrada.php"; 
        //Verifica se o id é do cliente ou adm. A depender no tipo, o usuário é redirecionado
        if (isset($_SESSION['idcli']) || isset($_SESSION['id_admin'])) {
            if (isset($_SESSION['idcli'])) {
                header("Location: ../php_usuario/shop.php"); 
            } elseif (isset($_SESSION['id_admin'])) {
                header("Location: ../php_adm/inicio.php"); 
            }
            exit();
        }
    ?>
    <main>
        <?php
            //Se a session não existir, cria-se ela
            if (!isset($_SESSION['erro_login'])) {
                $_SESSION['erro_login'] = 0;
            }
            //Se a session for maior que 1, exibi a mensagem de erro
            if ($_SESSION['erro_login'] >= 1): 
        ?>
        <div class="erro">
            <div class="erro mensagem">
                <img src="../../img/atencao.png" alt="Atenção" id="erro_img">
                <p>Usuário ou senha incorreto.</p>
            </div>
        </div>
        <?php endif; $_SESSION['erro_login'] = 0; ?>
        <div class="formulario">
            <h1>Login</h1>
            <form action="logar.php" method="post">
                <div class="formulario_campos">
                    <label for="email">Email: </label><br>
                    <input type="email" name="txtemail" id="email" required>
                </div>
                <div class="formulario_campos">
                    <label for="Senha">Senha: </label><br>
                    <input type="password" name="txtsenha" required id="senha">
                </div>
                <br><a href="cadastro.php" id="login_retorno">Não tem cadastro? Crie uma conta.</a><br><br>
                <button type="submit" class="btn" name="btnentrar"><b>Entrar</b></button>                             
            </form> 
        </div>
    </main>
    <?php include_once "footer_entrada.php"; ?>
    <script src="../../js/menu.js"></script>
</body>
</html>
