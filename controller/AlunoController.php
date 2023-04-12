<?php
include_once("services/AlunoService.php");
include_once("model/Aluno.php");

class AlunoController
{
    function postAluno()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $aluno = new Aluno();
            $aluno->mount($dadosRequest);

            //Valida o aluno no sistema
            $aluno->valid();

            $alunoService = new AlunoService();
            if ($aluno->matricula != null && $aluno->matricula != "" && $aluno->matricula != 0) {
                $alunoService->update($aluno);
                echo json_encode(array("message" => "Atualizado!"));
            } else {
                $alunoService->add($aluno);
                echo json_encode(array("message" => "Cadastrado!"));
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function getAluno()
    {
        try {
            $alunoService = new AlunoService();
            $result = $alunoService->getAll();
            echo json_encode(array("message" => "lista dados", "dados" => $result));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function putAluno()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $aluno = new Aluno();
            $aluno->mount($dadosRequest);

            //Valida o aluno no sistema
            $aluno->valid();

            $alunoService = new AlunoService();
            $alunoService->update($aluno);
            echo json_encode(array("message" => "Atualizado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function deleteAluno()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->matricula) {
                throw new Exception("Erros ao buscar parâmetros para remover!");
            }

            $alunoService = new AlunoService();
            $alunoService->delete($dadosRequest->matricula);
            echo json_encode(array("message" => "Dados removidos!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
}
