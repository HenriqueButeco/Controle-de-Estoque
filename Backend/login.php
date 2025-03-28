<?php
require_once '../Backend/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Busca o usuário no banco:
    $sql = $conn->prepare("SELECT senha, tipo_de_usuario FROM estoque.cadastro_usuário WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->bind_result($senha_banco, $tipo_usuario_banco);
    $sql->fetch();

    if ($senha == $senha_banco) {
        if ($tipo_usuario == $tipo_usuario_banco) {
            // Redireciona conforme o tipo de usuário:
            if ($tipo_usuario == 1) {
                header("Location: \Controle-de-Estoque\Frontend\admin\adm.php");
            } else {
                header("Location: \Controle-de-Estoque\Frontend\user\user.php"); 
            }
        } else {
            echo "Tipo de usuário incorreto!";
        }
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>
