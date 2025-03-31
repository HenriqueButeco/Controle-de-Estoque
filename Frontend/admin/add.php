<?php
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = '&tec77@info!';  
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
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\addEdit.css">
    <title>Adicionar Produto</title>
</head>

<body>
    
    <div class="form-container">
        <h2>Adicionar Produto</h2>
        <form method="POST" onsubmit="return validarFormulario()">
            <div class="input-group">
                <input type="text" name="marca" placeholder="Marca" required>
            </div>
            <div class="input-group">
                <input type="text" name="colecao" placeholder="Coleção" required>
            </div>
            <div class="input-group">
                <input type="text" name="nome_cor" placeholder="Nome da Cor" required>
            </div>
            <div class="input-group">
                <input type="number" name="quantidade" placeholder="Quantidade" required>
            </div>
            <button type="submit" class="submit-button">Adicionar Produto</button>
        </form>
        <a href="adm.php" class="back-link">Voltar</a>
    </div>
    <script src="add.js"></script>
</body>
</html>

