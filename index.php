<?php

include_once("controller/AlunoController.php");

header("Content-type: application/json; charset=UTF-8");

$alunoController = new AlunoController();
$alunoController->postAluno();
