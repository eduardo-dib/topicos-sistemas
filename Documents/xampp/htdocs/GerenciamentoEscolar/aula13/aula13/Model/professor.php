<?php
include_once('conexao.php');

class Professor {
    private $id;
    private $nome;
    private $sobrenome;
    private $graduacao;
    private $data_nascimento;
    private $materia_id;

    public function __construct($nome = null, $sobrenome = null, $graduacao = null, $data_nascimento = null, $materia_id = null) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->graduacao = $graduacao;
        $this->data_nascimento = $data_nascimento;
        $this->materia_id = $materia_id;
    }

    public function cadastraProfessor() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO professores (nome, sobrenome, graduacao, data_nascimento, materia_id) VALUES (:nome, :sobrenome, :graduacao, :data_nascimento, :materia_id)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':sobrenome', $this->sobrenome);
            $sql->bindParam(':graduacao', $this->graduacao);
            $sql->bindParam(':data_nascimento', $this->data_nascimento);
            $sql->bindParam(':materia_id', $this->materia_id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Cadastro falhou! " . $erro->getMessage();
        }
    }

    public function ListaProfessor() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("
                SELECT professores.id, professores.nome, professores.sobrenome, professores.graduacao, 
                       professores.data_nascimento, professores.materia_id, materias.nome AS nome_materia
                FROM professores
                JOIN materias ON professores.materia_id = materias.id
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao listar professores! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirProfessor($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM professores WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao excluir professor! " . $erro->getMessage();
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

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function getGraduacao() {
        return $this->graduacao;
    }

    public function setGraduacao($graduacao) {
        $this->graduacao = $graduacao;
    }

    public function getMateriaId() {
        return $this->materia_id;
    }

    public function setMateriaId($materia_id) {
        $this->materia_id = $materia_id;
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
