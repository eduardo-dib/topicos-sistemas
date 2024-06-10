<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Matéria</title>
</head>
<body>
    <h1>Cadastrar Matéria</h1>
    <form method="POST" action="../Controller/salaController.php?action=C">
        <label>Número da Sala:</label>
        <input type="text" name="numero_sala" id="número_sala" placeholder="número da sala" required><br><br>

        <label>Capacidade:</label>
        <input type="text" name="capacidade" id="capacidade" placeholder="Capacidade da sala" required><br><br>

        <label>Localização:</label>
        <input type="text" name="localizacao" id="localizacao" placeholder="Localização da sala" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
