<?php  
$host = 'localhost';  
$dbname = 'estoque';  
$user = 'root';  
$password = 'root';  

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}
?>
