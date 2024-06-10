<?php
include_once('conexao.php');

class Materia {
    private $id;
    private $nome;
    private $descricao;

    public function __construct($nome = null, $descricao = null) {
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function cadastraMateria() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO materias (nome, descricao) VALUES (:nome, :descricao)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':descricao', $this->descricao);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Cadastro falhou! " . $erro->getMessage();
        }
    }

    public function ListaMateria() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, nome, descricao FROM materias");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao listar matérias! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirMateria($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM materias WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao excluir matéria! " . $erro->getMessage();
        }
    }

    public function editarMateria($id, $nome, $descricao) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("UPDATE materias SET nome = :nome, descricao = :descricao WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':nome', $nome);
            $sql->bindParam(':descricao', $descricao);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao editar matéria! " . $erro->getMessage();
        }
    }
    public function getMateriaById($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, nome, descricao FROM materias WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao buscar matéria! " . $erro->getMessage();
            return null;
        }
    }
    
    


    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>
