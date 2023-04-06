<?php

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

        //Ternário: seria um "IF" sem a palavra "IF".Sintaxe: <condicional> ? <true> : <false>
        return ($validMethod && $validURI) ? $callback() : false;
    } catch (Exception $e) {
        http_response_code(404);
        return false;
    }
}
