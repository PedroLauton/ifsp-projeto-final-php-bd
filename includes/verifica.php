<?php
//esse arquivo verifica, é uma camada adicional de segurança no sistema, basicamente fica verificando se o usu ainda está logado, ele é incluido em todas páginas q queremos bloquear acesso url
// Inclui o arquivo de configuração
require 'config.php';

// Verifica se a variável de sessão 'tipo_usuario' está definida e não está vazia
if (isset($_SESSION['tipo_usuario']) && !empty($_SESSION['tipo_usuario'])) {
    // Inclui a classe Usuario para utilizar suas funções
    require_once 'Usuario.class.php';

    //  instância da classe Usuario
    $u = new Usuario();

    // Verifica se o usuário é um cliente
    if ($_SESSION['tipo_usuario'] == 'cliente') {
        // Verifica se a variável de sessão 'idcli' está definida e não está vazia
        if (isset($_SESSION['idcli']) && !empty($_SESSION['idcli'])) {
            // Chama o método 'logged' da classe Usuario para obter informações do cliente logado
            $listLogged = $u->logged($_SESSION['idcli'], $_SESSION['tipo_usuario']);

            // Obtém o nome do cliente a partir do array retornado pelo método 'logged'
            $nomeUsu = isset($listLogged['Nome']) ? $listLogged['Nome'] : null;
        } else {
            // Se 'idcli' não estiver definido ou estiver vazio, redireciona para a página de login
            header("Location: login.php");
            exit();
        }
    } elseif ($_SESSION['tipo_usuario'] == 'administrador') {
        $listAdmin = $u->logged($_SESSION['id_admin'], $_SESSION['tipo_usuario']);

        // Verifica se $listAdmin é um array antes de tentar acessar o índice 'Nome'
        $nomeUsu = is_array($listAdmin) ? $listAdmin['Nome'] : null;
    } else {
        // Tipo de usuário desconhecido, redireciona para a página de login
        header("Location: login.php");
        exit();
    }
} else {
    // Se 'tipo_usuario' não estiver definido ou estiver vazio, redireciona para a página de login
    header("Location: ../../php_entrada/login.php");
    exit();
}

?>
