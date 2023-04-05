<?php

include_once("controller/AlunoController.php");

header("Content-type: application/json; charset=UTF-8");


router("post", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->postAluno();
});

router("get", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->getAluno();
});

router("put", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->putAluno();
});

router("delete", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->deleteAluno();
});

function router($method, $endpoint, $callback)
{
    try {
        $server = $_SERVER;
        //var_dump($server);

        //Valida verbo do request (POST, GET, PUT, DELETE...)
        $method_request = strtolower($server["REQUEST_METHOD"]);
        $validMethod = $method_request == strtolower($method);

        //$list_uri_request = explode("/", strtolower(htmlspecialchars($server["REQUEST_URI"])));
        //$list_endpoints = explode("/", strtolower(htmlspecialchars($endpoint)));

        $validURI = str_ends_with($server["REQUEST_URI"], $endpoint);

        return ($validMethod && $validURI) ? $callback() : false;
    } catch (Exception $e) {
        http_response_code(404);
        return false;
    }
}
