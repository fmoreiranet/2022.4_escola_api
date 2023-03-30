<?php

class DAO{
    private $pdo;

    function connect(){
        try{
            //new PDO("mysql:host=localhost;port=3306;dbname=dbescolaweb", root, "");
            $pdo = new PDO('mysql:host=localhost;port=3306;dbname=dbescolaweb', "root", "");
            echo ("Conectado!");
        }catch(PDOException $e){
            $pdo = null;
            echo("<b>Error: </b>". $e->getMessage() ."</br>");
        }
        return $pdo;
    }


}