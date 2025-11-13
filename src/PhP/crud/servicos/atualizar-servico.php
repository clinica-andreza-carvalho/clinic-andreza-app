<?php
include 'conexao.php';

$id = $_POST['id_servico'];
$nome_servico = $_POST['nome_servico'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$duracao = $_POST['duracao_minutos'];

$sql = "UPDATE servicos SET 
          nome_servico='$nome_servico',
          descricao='$descricao',
          preco='$preco',
          duracao_minutos='$duracao'
        WHERE id_servico=$id";

if ($conn->query($sql) === TRUE) {
    echo "Serviço atualizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
