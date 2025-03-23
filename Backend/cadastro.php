<?php
// arrumar de acordo com o bd
require_once '../Backend/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $primeiro_nome = mysqli_real_escape_string($conn, $_POST['primeiro_nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];
    $tipo_usuario = (int)$_POST['tipo_usuario'];

    // Verifica se o e-mail já está registrado
    $sql = "SELECT * FROM Cadastro_Usuário WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $erro = "E-mail já cadastrado!";
        //criptografar senha
   } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql_insert = "INSERT INTO Cadastro_Usuário (primeiro_nome, email, senha, tipo_de_usuario) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param('sssi', $primeiro_nome, $email, $senha_hash, $tipo_usuario);

        if ($stmt_insert->execute()) {
            $_SESSION['sucesso'] = "Cadastro realizado com sucesso! Faça login para continuar.";
            header('Location: login.html');
            exit();
        } else {
            $erro = "Erro ao realizar o cadastro. Tente novamente.";
        }
    }
}
?>