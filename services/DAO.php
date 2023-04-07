<?php

class DAO
{
    private $pdo;

    function connect()
    {
        try {
            //new PDO("mysql:host=localhost;port=3306;dbname=dbescolaweb", root, "");
            $pdo = new PDO('mysql:host=localhost;port=3306;dbname=dbescola', "root", "");

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo json_encode(array("message" => "Conectado!"));
        } catch (PDOException $e) {
            $pdo = null;
            echo json_encode(array("error" => $e->getMessage()));
        }
        return $pdo;
    }
}
