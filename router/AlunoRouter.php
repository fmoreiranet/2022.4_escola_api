<?php
include_once("controller/AlunoController.php");
include_once("router.php");

router("post", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->postAluno();
});
router("post", "aluno/login", function () {
    $alunoController = new AlunoController();
    $alunoController->loginAluno();
});

router("get", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->getAluno();
});

router("put", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->getAluno();
});

router("delete", "aluno", function () {
    $alunoController = new AlunoController();
    $alunoController->deleteAluno();
});
