<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_agendamento = $_POST['id_agendamento'];
    $valor_pago = $_POST['valor_pago'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $data_pagamento = $_POST['data_pagamento'];
    $status_pagamento = $_POST['status_pagamento'];

    $sql = "INSERT INTO pagamentos (id_agendamento, valor_pago, forma_pagamento, data_pagamento, status_pagamento)
            VALUES ('$id_agendamento', '$valor_pago', '$forma_pagamento', '$data_pagamento', '$status_pagamento')";

    if ($conn->query($sql) === TRUE) {
        echo "Pagamento registrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    <label>ID do Agendamento:</label>
    <input type="number" name="id_agendamento" required><br>

    <label>Valor Pago:</label>
    <input type="text" name="valor_pago" required><br>

    <label>Forma de Pagamento:</label>
    <select name="forma_pagamento" required>
        <option value="Dinheiro">Dinheiro</option>
        <option value="Cartão">Cartão</option>
        <option value="Pix">Pix</option>
        <option value="Transferência">Transferência</option>
    </select><br>

    <label>Data do Pagamento:</label>
    <input type="date" name="data_pagamento" required><br>

    <label>Status:</label>
    <select name="status_pagamento">
        <option value="Pendente">Pendente</option>
        <option value="Pago">Pago</option>
        <option value="Cancelado">Cancelado</option>
    </select><br>

    <button type="submit">Registrar Pagamento</button>
</form>