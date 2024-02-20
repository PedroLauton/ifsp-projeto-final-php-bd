<?php
//vamos trabalhar no nosso login com orientação objeto
class Usuario {
    // Função para realizar login
    public function login($email, $senha)
    {
        global $pdo;

        // Consulta SQL para selecionar cliente com o email e senha fornecidos
        $sqlCliente = "SELECT * FROM clientes WHERE Email = :email AND Senha = :senha";
        // prepara  consulta para o banco de dados e armazena o objeto de declaração resultante na variável `$stmtCliente` para execução posterior.
        $stmtCliente = $pdo->prepare($sqlCliente);
        $stmtCliente->bindValue(":email", $email);
        $stmtCliente->bindValue(":senha", $senha);
        $stmtCliente->execute();

        // Consulta SQL para selecionar administrador com o email e senha fornecidos
        $sqlAdmin = "SELECT * FROM administradores WHERE Email = :email AND Senha = :senha";
        $stmtAdmin = $pdo->prepare($sqlAdmin);
        $stmtAdmin->bindValue(":email", $email);
        $stmtAdmin->bindValue(":senha", $senha);
        $stmtAdmin->execute();

        // Verifica se há algum resultado para clientes

        //basicamente o rowcount conta quantos registros tem c essa info

        //maior q 0, significaa q existe
        if ($stmtCliente->rowCount() > 0) {
            //fetch recupera so uma linha 
            $dado = $stmtCliente->fetch();
            $_SESSION['idcli'] = $dado['ClienteId'];//session pega o dado do cliente e grava, retorna true se existir
            $_SESSION['tipo_usuario'] = 'cliente';
            return true; // Retorna verdadeiro indicando login bem-sucedido para cliente
        } elseif ($stmtAdmin->rowCount() > 0) {
            $dado = $stmtAdmin->fetch();
            $_SESSION['id_admin'] = $dado['AdmId']; // Assuma que 'id' é o campo de identificação do administrador
            $_SESSION['tipo_usuario'] = 'administrador';
            return true; // Retorna verdadeiro indicando login bem-sucedido para administrador
        } else {
            return false; // Retorna falso indicando falha no login
        }
    }

    // Função para obter informações do cliente logado
    public function logged($id, $tipoUsuario) //pega o parametro id e o tipo de quem esta logando
    {
        global $pdo;
    
        // Escolhe a tabela e a coluna com base no tipo de usuário
        $tabela = ($tipoUsuario == 'cliente') ? 'clientes' : 'administradores';
        $colunaId = ($tipoUsuario == 'cliente') ? 'ClienteId' : 'AdmId';
    
        // Consulta SQL para obter o nome do usuário com base no ID
        $sql = "SELECT Nome FROM $tabela WHERE $colunaId = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    
        // Retorna os resultados como um array associativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para verificar se o usuário logado é um administrador
    public function ehAdministrador()
    {
        return isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador';
    }
}
?>
