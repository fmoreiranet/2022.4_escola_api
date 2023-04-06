<?php
include_once("router/routers.php");
include_once("controller/AlunoController.php");

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
