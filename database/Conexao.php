<?php

/**
 * Função que efetua a conexão do banco
 * 
 */

function conexao()
{

    $host = "localhost";
    $banco = "todolist";
    $usuario = "root";
    $senha = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->exec("set names utf8");

        return $conn;
    } catch (PDOException $e) {
        die($e->getMessage());
        return null;
    }
}
