<?php
include '../conexao.php';

$sql = "SELECT p.*, c.nome AS cliente
        FROM pagamentos p
        JOIN agendamentos a ON p.id_agendamento = a.id_agendamento
        JOIN clientes c ON a.id_cliente = c.id_cliente";

$result = $conn->query($sql);
?>

<h2>Lista de Pagamentos</h2>
<table border="1">
    <tr>
        <th>Cliente</th>
        <th>Valor</th>
        <th>Forma</th>
        <th>Data</th>
        <th>Status</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['cliente'] ?></td>
        <td>R$ <?= $row['valor_pago'] ?></td>
        <td><?= $row['forma_pagamento'] ?></td>
        <td><?= $row['data_pagamento'] ?></td>
        <td><?= $row['status_pagamento'] ?></td>
    </tr>
    <?php } ?>
</table>