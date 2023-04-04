<?php
include_once("DAO.php");

class AlunoService
{
    function add(Aluno $aluno)
    {
        try {
            $sql = "INSERT into aluno (nome, email, senha) values (:nome, :email, :senha)";
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
}
