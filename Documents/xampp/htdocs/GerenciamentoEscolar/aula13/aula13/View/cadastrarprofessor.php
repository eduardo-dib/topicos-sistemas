<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
</head>
<body>
    <h1>Cadastrar Professor</h1>
    <form method="POST" action="../Controller/professorController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do professor" required><br><br>
        
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome do professor" required><br><br>

        <label>Graduação:</label>
        <input type="text" name="graduacao" id="graduacao" placeholder="Graduação" required><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" required><br><br>

        <label>Id da matéria:</label>
        <input type="text" name="materia_id" id="materia_id" placeholder="Id da matéria" required><br><br>
        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
