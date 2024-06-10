<?php
include_once('../Model/professor.php');

class ProfessorController {
    public function processa($acao) {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $graduacao = $_POST['graduacao'];
            $data_nascimento = $_POST['data_nascimento'];
            $materia_id = $_POST['materia_id'];
            $novoProfessor = new Professor($nome, $sobrenome, $graduacao, $data_nascimento, $materia_id);
            $novoProfessor->cadastraProfessor();
            echo "Professor cadastrado com sucesso!";
        } elseif ($acao == "R") {
            $Professor = new Professor();
            $resultado = $Professor->ListaProfessor();
            include_once('../View/listarprofessor.php');
        }
    }

    public function processaDelete($id) {
        $professor = new Professor();
        $professor->excluirProfessor($id);
        header("Location: ../Controller/professorController.php?action=R");
        exit();
    }

    public function processaUpdate($id) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $materia = new Materia();
        $materia->setNome($nome);
        $materia->setDescricao($descricao);
        $materia->atualizarMateria($id);
        echo "Matéria atualizada com sucesso!";
    }

    public function processaEdit($id) {
        $materia = new Materia();
        $materiaAtual = $materia->getId($id);
        include_once('../View/editar.php');
    }
}

// Handling the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['action'];
    $controller = new ProfessorController();
    $controller->processa($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new ProfessorController();
        $controller->processaDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new ProfessorController();
        $controller->processaEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new ProfessorController();
        $controller->processa($acao);
    }
}
?>
