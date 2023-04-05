<?php
include_once("services/AlunoService.php");
include_once("model/Aluno.php");

class AlunoController
{
    function postAluno()
    {
        try {
            if (!router("post", "aluno"))
                return;

            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $aluno = new Aluno();
            $aluno->nome = $dadosRequest->nome;
            $aluno->email = $dadosRequest->email;
            $aluno->senha = $dadosRequest->senha;

            //Valida o aluno no sistema
            $aluno->valid();

            $alunoService = new AlunoService();
            $alunoService->add($aluno);
            echo json_encode(array("message" => "Cadastrado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function getAluno()
    {
        try {
            if (!router("get", "aluno"))
                return;
            echo "Get Aluno<br>";
        } catch (Exception $e) {
        }
    }
    function putAluno()
    {
        try {
            if (!router("put", "aluno"))
                return;
            echo "Update Aluno<br>";
        } catch (Exception $e) {
        }
    }
    function deleteAluno()
    {
        try {
            if (!router("delete", "aluno"))
                return;
            echo "Delete Aluno<br>";
        } catch (Exception $e) {
        }
    }
}
