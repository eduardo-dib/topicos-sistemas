<?php
include_once('../Model/sala.php'); // Importando a classe Materia

// Recebendo os dados da consulta
$salas = new Sala();
$resultado = $salas->ListaSala(); // Executando a consulta para listar as matérias

// Verificando se há resultados
if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Salas</title>
</head>
<body>
    <h1>Lista de Salas</h1>
    <table>
        <thead>
            <tr>
                <th>Número da Sala</th>
                <th>Capacidade</th>
                <th>Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $sala) {
                echo "<tr>";
                echo "<td>" . $sala['numero_sala'] . "</td>";
                echo "<td>" . $sala['capacidade'] . "</td>";
                echo "<td>" . $sala['localizacao'] . "</td>";
                echo "<td><a href='../Controller/salaController.php?action=delete&id=" . $sala['id'] . "'>Excluir</a></td>"; // Cor
                echo "<td><a href='../View/editar.php?id=" . $materia['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
} else {
    echo "Não há matérias cadastradas.";
}
?>
