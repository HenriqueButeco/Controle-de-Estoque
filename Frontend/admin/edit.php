<?php
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = 'root';  
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
?>

<h2>Editar Produto</h2>
<form method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="marca" value="<?= htmlspecialchars($produto['marca'] ?? '') ?>" required>
    <input type="text" name="colecao" value="<?= htmlspecialchars($produto['colecao'] ?? '') ?>" required>
    <input type="text" name="nome_cor" value="<?= htmlspecialchars($produto['nome_da_cor'] ?? '') ?>" required>
    <input type="number" name="quantidade" value="<?= htmlspecialchars($produto['quantidade'] ?? 0) ?>" required>
    <button type="submit">Salvar</button>
</form>
<a href="adm.php">Voltar</a>

<script src="edit.js"></script>