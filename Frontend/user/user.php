<?php  
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = 'root';  

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
} else {
    echo "";
}

// Consulta ao banco para buscar os produtos
$sql = "SELECT marca, colecao, nome_da_cor, quantidade, data_de_cadastro FROM estoque.produto_estoque";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <title>Estoque de Produtos</title>
</head>
<body>

<h2>Estoque de Produtos</h2>   
<br>
<table>
    <tr>
        <th>Marca</th>
        <th>Coleção</th>
        <th>Nome da Cor</th>
        <th>Quantidade</th>
        <th>Data de Cadastro</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['colecao'] . "</td>";
            echo "<td>" . $row['nome_da_cor'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['data_de_cadastro'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
    }

    $conn->close();
    ?>

</table>
</body>
</html>
