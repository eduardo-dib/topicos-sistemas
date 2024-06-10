<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Matéria</title>
</head>
<body>
    <h1>Cadastrar Matéria</h1>
    <form method="POST" action="../Controller/outrofuncionarioController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do funcionário" required><br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo" required><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" required><br><br>
        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
