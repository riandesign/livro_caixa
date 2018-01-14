<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "livro_caixa";

// Dados para conectar ao banco
$mysqli = new mysqli($host, $username, $password, $dbName);

// Verifica conexão
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>