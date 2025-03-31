<?php
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = 'root';  
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $colecao = $_POST['colecao'];
    $nome_cor = $_POST['nome_cor'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produto_estoque (marca, colecao, nome_da_cor, quantidade, data_de_cadastro) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $marca, $colecao, $nome_cor, $quantidade);
    $stmt->execute();

    header("Location: adm.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=..\css\table.css>
    <title>Adicionar</title>
</head>
<body>
    

<h2>Adicionar Produto</h2>
<form method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="marca" placeholder="Marca" required>
    <input type="text" name="colecao" placeholder="Coleção" required>
    <input type="text" name="nome_cor" placeholder="Nome da Cor" required>
    <input type="number" name="quantidade" placeholder="Quantidade" required>
    <button type="submit">Adicionar Produto</button>
</form>
<a href="index.php">Voltar</a>

</body>
<script src="add.js"></script>
</html>


