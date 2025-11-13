<?php
include '../conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $id_servico = $_POST['id_servico'];
    $data_agendamento = $_POST['data_agendamento'];
    $hora = $_POST['hora'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO agendamentos (id_cliente, id_servico, data_agendamento, hora, observacoes)
            VALUES ('$id_cliente', '$id_servico', '$data_agendamento', '$hora', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento realizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    <label>Cliente:</label>
    <input type="number" name="id_cliente" required><br>

    <label>Serviço:</label>
    <input type="number" name="id_servico" required><br>

    <label>Data:</label>
    <input type="date" name="data_agendamento" required><br>

    <label>Hora:</label>
    <input type="time" name="hora" required><br>

    <label>Observações:</label>
    <textarea name="observacoes"></textarea><br>

    <button type="submit">Agendar</button>
</form>