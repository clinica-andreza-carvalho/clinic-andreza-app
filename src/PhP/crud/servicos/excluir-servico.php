<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM servicos WHERE id_servico=$id";

if ($conn->query($sql) === TRUE) {
    echo "Serviço excluído com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
