<?php

include_once("controller/AlunoController.php");

header("Content-type: application/json; charset=UTF-8");

$alunoController = new AlunoController();
$alunoController->postAluno();
$alunoController->getAluno();
$alunoController->putAluno();
$alunoController->deleteAluno();

function router($method, $endpoint)
{
    try {
        $server = $_SERVER;
        //var_dump($server);

        $method_request = strtolower($server["REQUEST_METHOD"]);
        $uri_request = strtolower(htmlspecialchars($server["REQUEST_URI"]));

        $validMethod = $method_request == strtolower($method);
        $validURI = str_contains($uri_request, strtolower(htmlspecialchars($endpoint)));
        var_dump($validMethod && $validURI);
        return ($validMethod && $validURI);
    } catch (Exception $e) {
        http_response_code(404);
        return false;
    }
}
