<?php
include 'conexao.php';

$id = $_POST['id_cliente'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];

$sql = "UPDATE clientes SET 
          nome='$nome',
          telefone='$telefone',
          email='$email',
          data_nascimento='$data_nascimento'
        WHERE id_cliente=$id";

if ($conn->query($sql) === TRUE) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
