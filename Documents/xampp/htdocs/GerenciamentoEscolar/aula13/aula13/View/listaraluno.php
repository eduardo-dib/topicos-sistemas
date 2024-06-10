<?php
include_once('../Model/aluno.php'); // Importando a classe Aluno

// Recebendo os dados da consulta
$alunos = new Aluno();
$resultado = $alunos->listaAluno(); // Executando a consulta para listar os alunos

// Verificando se há resultados
if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Série</th>
                <th>Data de Nascimento</th>
                <th>Número da Sala</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $aluno) {
                echo "<tr>";
                echo "<td>" . $aluno['nome'] . "</td>";
                echo "<td>" . $aluno['sobrenome'] . "</td>";
                echo "<td>" . $aluno['serie'] . "</td>";
                echo "<td>" . $aluno['data_nascimento'] . "</td>";
                echo "<td>" . $aluno['numero_sala'] . "</td>";
                echo "<td><a href='../Controller/alunoController.php?action=delete&id=" . $aluno['id'] . "'>Excluir</a></td>";
                echo "<td><a href='../View/editarAluno.php?id=" . $aluno['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
} else {
    echo "Não há alunos cadastrados.";
}
?>
