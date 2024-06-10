<?php
include_once('../Model/aluno.php');

class AlunoController {
    public function processa($acao) {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $serie = $_POST['serie'];
            $dataNascimento = $_POST['data_nascimento'];
            $salaId = $_POST['sala_id'];
            $novoAluno = new Aluno($nome, $sobrenome, $serie, $dataNascimento, $salaId);
            $novoAluno->cadastraAluno();
            echo "Aluno cadastrado com sucesso!";
        } elseif ($acao == "R") {
            $aluno = new Aluno();
            $resultado = $aluno->listaAluno();
            include_once('../View/listaraluno.php');
        }
    }

    public function processaDelete($id) {
        $aluno = new Aluno();
        $aluno->excluirAluno($id);
        header("Location: ../Controller/alunoController.php?action=R");
        exit();
    }

    public function processaUpdate($id) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $serie = $_POST['serie'];
        $dataNascimento = $_POST['data_nascimento'];
        $salaId = $_POST['sala_id'];
        $aluno = new Aluno($nome, $sobrenome, $serie, $dataNascimento, $salaId);
        $aluno->atualizarAluno($id);
        echo "Aluno atualizado com sucesso!";
    }

    public function processaEdit($id) {
        $aluno = new Aluno();
        $alunoAtual = $aluno->getId($id);
        include_once('../View/editarAluno.php');
    }
}

// Handling the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new AlunoController();
    $controller->processa($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new AlunoController();
        $controller->processaDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new AlunoController();
        $controller->processaEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new AlunoController();
        $controller->processa($acao);
    }
}
?>
