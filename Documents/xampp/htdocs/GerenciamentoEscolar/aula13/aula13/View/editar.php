<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matéria</title>
</head>
<body>
    <h1>Editar Matéria</h1>
    <?php
    include_once('../Model/materia.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $materia = new Materia();
        $dados_materia = $materia->getMateriaById($id);
    ?>
    <form action="../Controller/materiaController.php?action=R&id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $dados_materia['nome']; ?>"><br><br>
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"><?php echo $dados_materia['descricao']; ?></textarea><br><br>
        <input type="submit" value="Editar Matéria">
    </form>
    <?php
    } else {
        echo "ID da matéria não fornecido.";
    }
    ?>
</body>
</html>
