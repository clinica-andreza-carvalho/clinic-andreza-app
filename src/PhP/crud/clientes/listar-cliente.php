<?php
include 'conexao.php';

$sql = "SELECT * FROM clientes ORDER BY nome";
$result = $conn->query($sql);
?>

<h2>Lista de Clientes</h2>
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Data Nascimento</th>
    <th>Ações</th>
  </tr>

<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id_cliente']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['telefone']}</td>
            <td>{$row['email']}</td>
            <td>{$row['data_nascimento']}</td>
            <td>
              <a href='editar_cliente.php?id={$row['id_cliente']}'>Editar</a> |
              <a href='excluir_cliente.php?id={$row['id_cliente']}'>Excluir</a>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='6'>Nenhum cliente cadastrado</td></tr>";
}
$conn->close();
?>
</table>
