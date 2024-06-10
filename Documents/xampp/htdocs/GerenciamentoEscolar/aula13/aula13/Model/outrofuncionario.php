<?php
include_once('conexao.php');

class OutroFuncionario {
    private $nome;
    private $cargo;
    private $data_nascimento;

    public function __construct($nome = null, $cargo = null, $data_nascimento = null) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->data_nascimento = $data_nascimento;
    }

    public function cadastraOutroFuncionario() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO outros_funcionarios (nome, cargo, data_nascimento) VALUES (:nome, :cargo, :data_nascimento)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':cargo', $this->cargo);
            $sql->bindParam(':data_nascimento', $this->data_nascimento);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Cadastro falhou! " . $erro->getMessage();
        }
    }

    public function ListaOutroFuncionario() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, nome, cargo, data_nascimento FROM outros_funcionarios");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao listar funcionários! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirOutroFuncionario($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM outros_funcionarios WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao excluir funcionário! " . $erro->getMessage();
        }
    }

    public function atualizarMateria($id) {
    try {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("UPDATE materias SET nome = :nome, descricao = :descricao WHERE id = :id");
        $sql->bindParam(':nome', $this->nome);
        $sql->bindParam(':descricao', $this->descricao);
        $sql->bindParam(':id', $id);
        $sql->execute();
    } catch(PDOException $erro) {
        echo "Erro ao atualizar matéria! " . $erro->getMessage();
    }
}

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>
