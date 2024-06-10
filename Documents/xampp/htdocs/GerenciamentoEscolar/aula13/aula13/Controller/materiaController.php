<?php
include_once('../Model/materia.php');

class MateriaController {
    public function processa($acao) {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaMateria = new Materia($nome, $descricao);
            $novaMateria->cadastraMateria();
            echo "Matéria cadastrada com sucesso!";
        } elseif ($acao == "R") {
            $materia = new Materia();
            $resultado = $materia->ListaMateria();
            include_once('../View/listar.php');
        }
    }

    public function processaDelete($id) {
        $materia = new Materia();
        $materia->excluirMateria($id);
        header("Location: ../Controller/materiaController.php?action=R");
        exit();
    }
    public function processaEdit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            
            $materia = new Materia();
            $materia->setId($id);
            $materia->setNome($nome);
            $materia->setDescricao($descricao);
            $materia->editarMateria($id, $nome, $descricao);
            
            header("Location: ../Controller/materiaController.php?action=R");
            exit();
        } else {
            
            header("Location: ../Controller/materiaController.php?action=R");
            exit();
        }
    }
    
}

// Handling the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new MateriaController();
    $controller->processa($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new MateriaController();
        $controller->processaDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new MateriaController();
        $controller->processaEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new MateriaController();
        $controller->processa($acao);
    }
}
?>
