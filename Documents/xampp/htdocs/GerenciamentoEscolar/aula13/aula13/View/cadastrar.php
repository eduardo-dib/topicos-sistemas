<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Matéria</title>
</head>
<body>
    <h1>Cadastrar Matéria</h1>
    <form method="POST" action="../Controller/materiaController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome da matéria" required><br><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição da matéria" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
