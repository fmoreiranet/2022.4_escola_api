<?php
include_once("DAO.php");

class AlunoService
{
    function add(Aluno $aluno)
    {
        try {
            $sql = "INSERT INTO aluno (nome, email, senha) VALUES (:nome, :email, :senha)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql); //Iniciar o preparativo para o envio dos dados ao banco;
            $stman->bindParam(":nome", $aluno->nome); //Troca dos paramentos
            $stman->bindParam(":email", $aluno->email);
            $stman->bindParam(":senha", $aluno->senha);
            $stman->execute(); //Gravar os dados no banco de dados
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar!" . $e->getMessage());
        }
    }

    function getAll()
    {
        try {
            $sql = "SELECT matricula, nome, email, data_nasc FROM aluno WHERE ativo = true";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os dados!" . $e->getMessage());
        }
    }

    function update(Aluno $aluno)
    {
        try {
            $sql = "UPDATE aluno SET nome = :nome, email = :email WHERE matricula = :matricula";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":nome", $aluno->nome);
            $stman->bindParam(":email", $aluno->email);
            $stman->bindParam(":matricula", $aluno->matricula);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar!" . $e->getMessage());
        }
    }

    function delete(int $matricula)
    {
        try {
            //$sql = "DELETE FROM aluno WHERE matricula = :matricula";
            $sql = "UPDATE aluno SET ativo = false WHERE matricula = :matricula";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":matricula", $matricula);
            $stman->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao remover os dados!" . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro no servidor!" . $e->getMessage());
        }
    }
}
