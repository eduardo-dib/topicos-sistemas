<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <h1>Cadastrar Aluno</h1>
    <form method="POST" action="../Controller/alunocontroller.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do aluno" required><br><br>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome do aluno" required><br><br>

        <label>Série:</label>
        <input type="text" name="serie" id="serie" placeholder="Série" required><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" required><br><br>

        <label>Sala ID:</label>
        <input type="number" name="sala_id" id="sala_id" placeholder="ID da Sala" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
