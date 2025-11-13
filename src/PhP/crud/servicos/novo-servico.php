<?php
include 'conexao.php';

$nome_servico = $_POST['nome_servico'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$duracao = $_POST['duracao_minutos'];

$sql = "INSERT INTO servicos (nome_servico, descricao, preco, duracao_minutos)
        VALUES ('$nome_servico', '$descricao', '$preco', '$duracao')";

if ($conn->query($sql) === TRUE) {
    echo "Serviço cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
