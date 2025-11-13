<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM servicos WHERE id_servico=$id";
    $result = $conn->query($sql);
    $servico = $result->fetch_assoc();
}
?>

<h2>Editar Serviço</h2>
<form action="atualizar_servico.php" method="post">
  <input type="hidden" name="id_servico" value="<?php echo $servico['id_servico']; ?>">

  <label>Nome do Serviço:</label><br>
  <input type="text" name="nome_servico" value="<?php echo $servico['nome_servico']; ?>" required><br>

  <label>Descrição:</label><br>
  <textarea name="descricao"><?php echo $servico['descricao']; ?></textarea><br>

  <label>Preço (R$):</label><br>
  <input type="number" step="0.01" name="preco" value="<?php echo $servico['preco']; ?>" required><br>

  <label>Duração (minutos):</label><br>
  <input type="number" name="duracao_minutos" value="<?php echo $servico['duracao_minutos']; ?>"><br><br>

  <input type="submit" value="Atualizar Serviço">
</form>
