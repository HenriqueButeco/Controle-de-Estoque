<?php
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = '&tec77@info!';  
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_GET['id'] ?? '';

if ($id == '') {
    die("ID do produto não informado.");
}

$sql = "SELECT * FROM produto_estoque WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$produto = $result->fetch_assoc();

if (!$produto) {
    die("Produto não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $colecao = $_POST['colecao'];
    $nome_cor = $_POST['nome_cor'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produto_estoque SET marca=?, colecao=?, nome_da_cor=?, quantidade=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $marca, $colecao, $nome_cor, $quantidade, $id);
    $stmt->execute();

    header("Location: adm.php");
    exit();
}

$marca = htmlspecialchars($produto['marca'] ?? '', ENT_QUOTES, 'UTF-8');
$colecao = htmlspecialchars($produto['colecao'] ?? '', ENT_QUOTES, 'UTF-8');
$nome_cor = htmlspecialchars($produto['nome_da_cor'] ?? '', ENT_QUOTES, 'UTF-8');
$quantidade = htmlspecialchars($produto['quantidade'] ?? '0', ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\addEdit.css">
    <title>Editar Produto</title>
</head>

<body>
    <div class="form-container">
        <h2>Editar Produto</h2>
        <form method="POST" onsubmit="return validarFormulario()">
            <div class="input-group">
                <input type="text" name="marca" id="marca" placeholder="Marca" value="<?= $marca ?>" required>
            </div>
            <div class="input-group">
                <input type="text" name="colecao" id="colecao" placeholder="Coleção" value="<?= $colecao ?>" required>
            </div>
            <div class="input-group">
                <input type="text" name="nome_cor" id="nome_cor" placeholder="Nome da Cor" value="<?= $nome_cor ?>" required>
            </div>
            <div class="input-group">
                <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade" value="<?= $quantidade ?>" required>
            </div>
            <button type="submit" class="submit-button">Salvar</button>
        </form>
        <a href="adm.php" class="back-link">Voltar</a>
    </div>
    <script src="add.js"></script>
</body>
</html>
