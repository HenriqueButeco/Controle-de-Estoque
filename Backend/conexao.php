<?php

$host = 'localhost'; 
$dbname = 'estoque';
$user = 'root'; 
$password = 'root'; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb3", $user, $password);
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida!";

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

?>
