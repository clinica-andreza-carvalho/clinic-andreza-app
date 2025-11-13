<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id_cliente=$id";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();
 }
?>

<form action="atualizar_cliente.php" method="post">
  <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">
  
  <label>Nome:</label><br>
  <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>"><br>

  <label>Telefone:</label><br>
  <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>"><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br>

  <label>Data de Nascimento:</label><br>
  <input type="date" name="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>"><br><br>

  <input type="submit" value="Atualizar">
</form>
