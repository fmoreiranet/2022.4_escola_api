<?php

include_once("services/AlunoService.php");
include_once("model/Aluno.php");

header("Content-type: application/json; charset=UTF-8");

try {
    $alunoService = new AlunoService();
    $aluno = new Aluno();

    $dadosRequest = json_decode(file_get_contents('php://input'));
    $aluno->nome = $dadosRequest->nome;
    $aluno->email =  $dadosRequest->email;
    $aluno->senha =  $dadosRequest->senha;

    $alunoService->add($aluno);
    echo json_encode(array("message" => "Cadastrado!"));
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("error" => $e->getMessage()));
}
