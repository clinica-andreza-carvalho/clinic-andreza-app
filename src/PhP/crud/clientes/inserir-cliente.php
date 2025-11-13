<?php
include 'conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];

$sql = "INSERT INTO clientes (nome, telefone, email, data_nascimento)
        VALUES ('$nome', '$telefone', '$email', '$data_nascimento')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>