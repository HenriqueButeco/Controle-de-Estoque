<?php
session_start();
require_once '../Backend/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];
    $tipo_usuario = (int)$_POST['tipo_usuario'];

    $sql = "SELECT * FROM Cadastro_Usuário WHERE email = ? AND tipo_de_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $email, $tipo_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_tipo'] = $usuario['tipo_de_usuario'];

            if ($usuario['tipo_de_usuario'] === 1) {
                header('Location: ../Frontend/admin/adm.php');
            } else {
                header('Location: ../Frontend/user/user.php');
            }
            exit();
        } else {
            $erro = 'Senha incorreta!';
        }
    } else {
        $erro = 'Usuário não encontrado ou tipo de usuário incorreto!';
    }

    if (isset($erro)) {
        echo $erro;
    }
}
?>
