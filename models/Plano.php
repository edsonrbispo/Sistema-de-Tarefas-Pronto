<?php

require_once BANCO_DE_DADOS;

function listarPlanos()
{
    $db = conexao();

    //Ordernar por ordem de cadastro
    //$sql = "SELECT * FROM planos ORDER BY planos.id DESC";

    $sql = "SELECT * FROM planos ORDER BY planos.id DESC";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}



function cadastrarPlano($plano)
{

    if (validacaoPlano($plano))
        return false;


    $db = conexao();
    $sql = "INSERT INTO planos (titulo, descricao, valor) 
                       VALUES (:titulo, :descricao, :valor)";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":titulo", $plano['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $plano['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(":valor", $plano['valor'], PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


function buscarPlano($id)
{
    $db = conexao();

    $sql = "SELECT * FROM planos WHERE id=:id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        die($e->getMessage());
        return false;
    }
}


function editarPlano($plano, $id)
{

    if (validacaoPlano($plano))
        return false;

    $db = conexao();
    $sql = "UPDATE planos

                  SET titulo=:titulo,
                      descricao=:descricao,
                      valor=:valor 

                WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":titulo", $plano['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $plano['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(":valor", $plano['valor'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}





function deletarPlano($id)
{
    $db = conexao();

    $sql = "DELETE FROM planos WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}


function validacaoPlano($plano)
{

    $validacao = false;

    if ($plano['titulo'] == "") {
        $_SESSION['titulo'] = 'Campo Obrigatório';
        $validacao = true;
    }

    if ($plano['descricao'] == "") {
        $_SESSION['descricao'] = 'Campo Obrigatório';
        $validacao = true;
    }

    if ($plano['valor'] == "") {
        $_SESSION['valor'] = 'Campo Obrigatório';
        $validacao = true;
    }

    return $validacao;
}
