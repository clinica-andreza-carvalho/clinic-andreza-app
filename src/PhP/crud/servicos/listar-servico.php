<?php
include 'conexao.php';

$sql = "SELECT * FROM servicos ORDER BY nome_servico";
$result = $conn->query($sql);
?>

<h2>Lista de Serviços</h2>
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Preço</th>
    <th>Duração (min)</th>
    <th>Ações</th>
  </tr>

<?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id_servico']}</td>
            <td>{$row['nome_servico']}</td>
            <td>{$row['descricao']}</td>
            <td>R$ {$row['preco']}</td>
            <td>{$row['duracao_minutos']}</td>
            <td>
              <a href='editar_servico.php?id={$row['id_servico']}'>Editar</a> |
              <a href='excluir_servico.php?id={$row['id_servico']}'>Excluir</a>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='6'>Nenhum serviço cadastrado</td></tr>";
}

$conn->close();
?>
</table>
