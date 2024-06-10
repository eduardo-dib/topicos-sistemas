<?php
include_once('../Model/sala.php');

class SalaController {
    public function processa($acao) {
        if ($acao == "C") {
            $numero_sala = $_POST['numero_sala'];
            $capacidade = $_POST['capacidade'];
            $localizacao = $_POST['localizacao'];
            $novaSala = new Sala($numero_sala, $capacidade, $localizacao);
            $novaSala->cadastraSala();
            echo "Sala cadastrada com sucesso!";
        } elseif ($acao == "R") {
            $sala = new Sala();
            $resultado = $sala->ListaSala();
            include_once('../View/listarsala.php');
        }
    }

    public function processaDelete($id) {
        $sala = new Sala();
        $sala->excluirSala($id);
        header("Location: ../Controller/salaController.php?action=R");
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
    $acao = $_GET['action'];
    $controller = new SalaController();
    $controller->processa($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new SalaController();
        $controller->processaDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new SalaController();
        $controller->processaEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new SalaController();
        $controller->processa($acao);
    }
}
?>
