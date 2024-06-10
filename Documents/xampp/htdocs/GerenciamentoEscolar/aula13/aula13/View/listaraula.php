<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Aulas</title>
</head>
<body>
    <h1>Lista de Aulas</h1>
    <table>
        <thead>
            <tr>
                <th>Horário de Início</th>
                <th>Horário de Fim</th>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>Sala</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
         
            include_once('../Model/aula.php');

            
            $aulas = new Aula();

         
            $resultado = $aulas->ListaAulas();

          
            if (count($resultado) > 0) {
                
               foreach ($resultado as $aula) {
                   echo "<tr>";
                   echo "<td>" . $aula['horario_inicio'] . "</td>";
                   echo "<td>" . $aula['horario_fim'] . "</td>";
                   echo "<td>" . $aula['disciplina'] . "</td>"; 
                   echo "<td>" . $aula['professor'] . "</td>"; 
                   echo "<td>" . $aula['sala'] . "</td>";
                   echo "<td><a href='../Controller/aulaController.php?action=delete&id=" . $aula['id'] . "'>Excluir</a></td>";
                   echo "<td><a href='../View/editar.php?id=" . $aula['id'] . "'>Editar</a></td>";
                   echo "</tr>";
               }

            } else {
                echo "<tr><td colspan='6'>Não há aulas cadastradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
