<?php
include_once("config.php");
include_once("router/AlunoRouter.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($method == "OPTIONS") {
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Max-Age: 3600"); //1hora == 3600 seg;
    header("Access-Control-Allow-Credentials: true");
}
