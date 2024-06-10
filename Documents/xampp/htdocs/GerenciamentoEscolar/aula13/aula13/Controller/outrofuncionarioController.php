<?php
include_once('../Model/outrofuncionario.php');

class OutroFuncionarioController {
    public function processa($acao) {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $data_nascimento = $_POST['data_nascimento'];
            $novoOutroFuncionario = new OutroFuncionario($nome, $cargo, $data_nascimento);
            $novoOutroFuncionario->cadastraOutroFuncionario();
            echo "Funcionário cadastrado com sucesso!";
        } elseif ($acao == "R") {
            $outroFuncionario = new OutroFuncionario();
            $resultado = $outroFuncionario->ListaOutroFuncionario();
            include_once('../View/listaroutrosfuncionarios.php');
        }
    }

    public function processaDelete($id) {
        $outroFuncionario = new OutroFuncionario();
        $outroFuncionario->excluirOutroFuncionario($id);
        header("Location: ../Controller/outrofuncionarioController.php?action=R");
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
    $controller = new OutroFuncionarioController();
    $controller->processa($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new OutroFuncionarioController();
        $controller->processaDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new OutroFuncionarioController();
        $controller->processaEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new OutroFuncionarioController();
        $controller->processa($acao);
    }
}
?>
