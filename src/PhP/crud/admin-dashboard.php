<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo da Clínica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .menu a {
            display: block;
            padding: 15px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu a:hover {
            background-color: #0056B3;
        }
    </style>
</head>
<body>
    <h1>Painel Administrativo da Clínica Estética</h1>
    
<div class="menu">
    <!-- CLIENTES -->
    <a href="clientes/form_cliente.html">Cadastrar Cliente</a>
    <a href="clientes/listar_clientes.php">Listar Clientes</a>
    <a href="clientes/editar_cliente.php">Editar Cliente</a>
    <a href="clientes/inserir_cliente.php">Inserir Cliente</a>
    <a href="clientes/atualizar_cliente.php">Atualizar Cliente</a>
    <a href="clientes/excluir_cliente.php">Excluir Cliente</a>

    <!-- SERVIÇOS -->
    <a href="servicos/form_servico.html">Novo Serviço</a>
    <a href="servicos/listar_servicos.php">Listar Serviços</a>
    <a href="servicos/editar_servico.php">Editar Serviço</a>
    <a href="servicos/excluir_servico.php">Excluir Serviço</a>
    <a href="servicos/atualizar_servico.php">Atualizar Serviço</a>

    <!-- AGENDAMENTOS -->
    <a href="agendamentos/novo_agendamento.php">Novo Agendamento</a>
    <a href="agendamentos/listar_agendamentos.php">Listar Agendamentos</a>

    <!-- PAGAMENTOS -->
    <a href="pagamentos/novo_pagamento.php">Registrar Pagamento</a>
    <a href="pagamentos/listar_pagamentos.php">Listar Pagamentos</a>
</div>

</body>
</html>