<?php
session_start();
require_once '../Backend/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario_id = $_POST['tipo_usuario'];  // Agora usamos tipo_usuario_id (chave estrangeira)

    // Consulta SQL para buscar o usuário no banco de dados com a chave estrangeira do tipo de usuário
    $sql = "SELECT u.id, u.email, u.senha, t.tipo_nome FROM usuarios u
            JOIN tipos_usuarios t ON u.tipo_usuario_id = t.id
            WHERE u.email = ? AND u.tipo_usuario_id = ?";
    
    // Preparar a consulta
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo_usuario_id = $_POST['tipo_usuario'];  // Agora usamos tipo_usuario_id (chave estrangeira)
    
        // Consulta SQL para buscar o usuário no banco de dados com a chave estrangeira do tipo de usuário
        // Use o nome completo da tabela: estoque.cadastro_usuario
        $sql = "SELECT u.id, u.email, u.senha, t.tipo_de_usuario FROM estoque.cadastro_usuario u
                JOIN estoque.tipos_usuarios t ON u.tipo_usuario = t.id
                WHERE u.email = ? AND u.tipo_usuario = ?";
        
        // Preparar a consulta
        if ($stmt = $conn->prepare($sql)) {
            // Vincular os parâmetros à consulta
            $stmt->bind_param('si', $email, $tipo_usuario_id);  // 's' para string (email) e 'i' para inteiro (tipo_usuario_id)
    
            // Executar a consulta
            $stmt->execute();
    
            // Obter o resultado da consulta
            $result = $stmt->get_result();
    
            // Verificar se o usuário foi encontrado
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
    
                // Verificar se a senha está correta
                if ($senha === $usuario['senha']) {
                    // Senha correta, iniciar a sessão
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['tipo_usuario_id'] = $usuario['tipo_usuario_id'];
                    $_SESSION['tipo_nome'] = $usuario['tipo_nome'];
    
                    // Redirecionar para a página correta (Admin ou User)
                    if ($usuario['tipo_usuario_id'] == 1) {
                        // Se for admin, redireciona para o painel de administração
                        header("Location: painel_admin.php");
                    } else {
                        // Se for usuário comum, redireciona para o painel de usuário
                        header("Location: painel_usuario.php");
                    }
                    exit;
                } else {
                    echo "Senha incorreta.";
                }
            } else {
                echo "Usuário não encontrado ou tipo de usuário inválido.";
            }
    
            // Fechar a declaração
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    }
}
    // Fechar a conexão
    $conn->close();
    ?>
