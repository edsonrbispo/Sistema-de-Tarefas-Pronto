<?php

require_once BANCO_DE_DADOS;

function listarTarefas($filtrar)
{
    $db = conexao();

    //Ordernar por ordem de cadastro
    //$sql = "SELECT * FROM tarefas ORDER BY paginas.id DESC";
    //Lista tarefas... AND usuario_id = :usuario_id

    if ($filtrar != null) {
        if ($filtrar['status'] == 'todos') {
            $sql = "SELECT * FROM tarefas WHERE tarefa LIKE :tarefa AND usuario_id = :usuario_id";
        } else {
            $sql = "SELECT * FROM tarefas WHERE tarefa LIKE :tarefa AND status = :status AND usuario_id = :usuario_id";
        }

        try {

            $stmt = $db->prepare($sql);

            $stmt->bindValue(":tarefa", "%{$filtrar['buscar']}%", PDO::PARAM_STR);

            $stmt->bindParam(":usuario_id", $_SESSION['usuario']['id'], PDO::PARAM_INT);

            if ($filtrar['status'] != 'todos') {
                $stmt->bindParam(":status", $filtrar['status'], PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
    } else {
        $sql = "SELECT * FROM tarefas WHERE usuario_id = :usuario_id ORDER BY tarefas.id DESC";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":usuario_id", $_SESSION['usuario']['id'], PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
    }
}



function cadastrarTarefa($dado)
{
    $db = conexao();
    $sql = "INSERT INTO tarefas (tarefa, descricao, prioridade, status, data_cadastro, usuario_id) 
                       VALUES (:tarefa, :descricao, :prioridade, :status, :data_cadastro, :usuario_id)";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tarefa", $dado['tarefa'], PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $dado['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(":prioridade", $dado['prioridade'], PDO::PARAM_STR);
        $stmt->bindParam(":status", $dado['status'], PDO::PARAM_INT);
        $stmt->bindParam(":data_cadastro", $dado['data_cadastro'], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id", $dado['usuario_id'], PDO::PARAM_INT);

        $stmt->execute();

        //retorna o ID do registro cadastrao
        //$ultimo_id = $stmt->fetch(PDO::FETCH_ASSOC);

        return true;
    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


function buscarTarefa($id)
{
    $db = conexao();

    $sql = "SELECT * FROM tarefas WHERE id=:id";

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

function editarTarefa($dado, $id)
{

    $db = conexao();
    $sql = "UPDATE tarefas

                  SET tarefa = :tarefa,
                      descricao = :descricao, 
                      prioridade = :prioridade, 
                      status = :status

                WHERE id = :id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tarefa", $dado['tarefa'], PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $dado['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(":prioridade", $dado['prioridade'], PDO::PARAM_STR);
        $stmt->bindParam(":status", $dado['status'], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}





function deletarTarefa($id)
{
    $db = conexao();

    $sql = "DELETE FROM tarefas WHERE id=:id";
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


function atualizarStatusTarefa($id)
{

    $db = conexao();

    $tarefa = buscarTarefa($id);

    $status = $tarefa['status'] ? 0 : 1;

    $sql = "UPDATE tarefas
               SET status = :status
               WHERE id = :id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}
