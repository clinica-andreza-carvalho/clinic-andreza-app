<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id_cliente=$id";

if ($conn->query($sql) === TRUE) {
    echo "Cliente excluído com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
