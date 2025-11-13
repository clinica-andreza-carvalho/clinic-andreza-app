<?php
include '../conexao.php';

$sql = "SELECT a.*, c.nome AS cliente, s.nome_servico AS servico
        FROM agendamentos a
        JOIN clientes c ON a.id_cliente = c.id_cliente
        JOIN servicos s ON a.id_servico = s.id_servico";

$result = $conn->query($sql);
?>

<h2>Lista de Agendamentos</h2>
<table border="1">
    <tr>
        <th>Cliente</th>
        <th>Serviço</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Status</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['cliente'] ?></td>
        <td><?= $row['servico'] ?></td>
        <td><?= $row['data_agendamento'] ?></td>
        <td><?= $row['hora'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php } ?>
</table>