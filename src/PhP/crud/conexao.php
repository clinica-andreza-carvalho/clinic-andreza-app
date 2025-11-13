<?php
$host = "localhost";
$usuario = "root";      // Nosso usuário no MySQL
$senha = "";            // Nossa senha no MySQL
$banco = "clinica_estetica";

$conn = new mysqli($host, $usuario, $senha, $banco);


// Checagem de conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

echo "Conectado com sucesso!";
?>
