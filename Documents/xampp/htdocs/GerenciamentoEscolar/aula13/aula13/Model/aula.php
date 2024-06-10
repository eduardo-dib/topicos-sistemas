<?php
include_once('conexao.php');

class Aula {
    private $id;
    private $horarioInicio;
    private $horarioFim;
    private $disciplinaId;
    private $professorId;
    private $salaId;

    public function __construct($horarioInicio = null, $horarioFim = null, $disciplinaId = null, $professorId = null, $salaId = null) {
        $this->horarioInicio = $horarioInicio;
        $this->horarioFim = $horarioFim;
        $this->disciplinaId = $disciplinaId;
        $this->professorId = $professorId;
        $this->salaId = $salaId;
    }

    public function cadastraAula() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO aulas (horario_inicio, horario_fim, disciplina_id, professor_id, sala_id) VALUES (:horario_inicio, :horario_fim, :disciplina_id, :professor_id, :sala_id)");
            $sql->bindParam(':horario_inicio', $this->horarioInicio);
            $sql->bindParam(':horario_fim', $this->horarioFim);
            $sql->bindParam(':disciplina_id', $this->disciplinaId);
            $sql->bindParam(':professor_id', $this->professorId);
            $sql->bindParam(':sala_id', $this->salaId);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Cadastro de aula falhou! " . $erro->getMessage();
        }
    }

    public function listaAulas() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("
                SELECT aulas.id, aulas.horario_inicio, aulas.horario_fim, materias.nome AS disciplina, professores.nome AS professor, salas.numero_sala AS sala
                FROM aulas
                JOIN materias ON aulas.disciplina_id = materias.id
                JOIN professores ON aulas.professor_id = professores.id
                JOIN salas ON aulas.sala_id = salas.id
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao listar aulas! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirAula($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM aulas WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao excluir aula! " . $erro->getMessage();
        }
    }

    public function atualizarAula($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("UPDATE aulas SET horario_inicio = :horario_inicio, horario_fim = :horario_fim, disciplina_id = :disciplina_id, professor_id = :professor_id, sala_id = :sala_id WHERE id = :id");
            $sql->bindParam(':horario_inicio', $this->horarioInicio);
            $sql->bindParam(':horario_fim', $this->horarioFim);
            $sql->bindParam(':disciplina_id', $this->disciplinaId);
            $sql->bindParam(':professor_id', $this->professorId);
            $sql->bindParam(':sala_id', $this->salaId);
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao atualizar aula! " . $erro->getMessage();
        }
    }

    // Getters e setters

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getHorarioInicio() {
        return $this->horarioInicio;
    }

    public function setHorarioInicio($horarioInicio) {
        $this->horarioInicio = $horarioInicio;
    }

    public function getHorarioFim() {
        return $this->horarioFim;
    }

    public function setHorarioFim($horarioFim) {
        $this->horarioFim = $horarioFim;
    }

    public function getDisciplinaId() {
        return $this->disciplinaId;
    }

    public function setDisciplinaId($disciplinaId) {
        $this->disciplinaId = $disciplinaId;
    }

    public function getProfessorId() {
        return $this->professorId;
    }

    public function setProfessorId($professorId) {
        $this->professorId = $professorId;
    }

    public function getSalaId() {
        return $this->salaId;
    }

    public function setSalaId($salaId) {
        $this->salaId = $salaId;
    }
}
?>
