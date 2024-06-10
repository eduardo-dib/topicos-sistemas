<?php
include_once('conexao.php');

class Sala {
    private $numero_sala;
    private $capacidade;
    private $localizacao;

    public function __construct($numero_sala = null, $capacidade = null, $localizacao = null) {
        $this->numero_sala = $numero_sala;
        $this->capacidade = $capacidade;
        $this->localizacao = $localizacao;
    }

    public function cadastraSala() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO salas (numero_sala, capacidade, localizacao) VALUES (:numero_sala, :capacidade, :localizacao)");
            $sql->bindParam(':numero_sala', $this->numero_sala);
            $sql->bindParam(':capacidade', $this->capacidade);
            $sql->bindParam(':localizacao', $this->localizacao);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Cadastro de sala falhou! " . $erro->getMessage();
        }
    }

    public function ListaSala() {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, numero_sala, capacidade, localizacao FROM salas");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $erro) {
            echo "Erro ao listar salas! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirSala($id) {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM salas WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch(PDOException $erro) {
            echo "Erro ao excluir sala! " . $erro->getMessage();
        }
    }

//    public function atualizarMateria($id) {
//    try {
//        $conn = Conexao::conectar();
//        $sql = $conn->prepare("UPDATE materias SET numero_sala$numero_sala = :numero_sala$numero_sala, capacidade = :capacidade WHERE id = :id");
//        $sql->bindParam(':numero_sala$numero_sala', $this->numero_sala$numero_sala);
//        $sql->bindParam(':capacidade', $this->capacidade);
//        $sql->bindParam(':id', $id);
//        $sql->execute();
//    } catch(PDOException $erro) {
//        echo "Erro ao atualizar matéria! " . $erro->getMessage();
//    }
//}

    public function getNumeroSala() {
       return $this->numero_sala;
    }
    
    public function setNumeroSala($numero_sala) {
       $this->numero_sala = $numero_sala;
    }

    public function getLocalizacao() {
        return $this->localizacao;
     }
     
     public function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
     }

    public function getCapacidade() {
        return $this->capacidade;
    }

    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>
