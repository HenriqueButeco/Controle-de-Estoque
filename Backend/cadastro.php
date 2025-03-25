<?php
require_once '../Backend/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario_id = $_POST['tipo_usuario'];

   
    $sql = "INSERT INTO estoque.cadastro_usuário (email, senha, tipo_de_usuario) VALUES ('$email', '$senha', '$tipo_usuario_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";

    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
}
?>