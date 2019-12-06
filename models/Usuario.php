<?php

require_once BANCO_DE_DADOS;

function listarUsuarios()
{
    $db = conexao();

    //Ordernar por ordem de cadastro
    //$sql = "SELECT * FROM usuarios ORDER BY usuarios.id DESC";

    $sql = "SELECT * FROM usuarios ORDER BY usuarios.id DESC";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}



function cadastrarUsuario($usuario)
{
    $db = conexao();
    $sql = "INSERT INTO usuarios (nome, email, senha, foto, nivel, data_cadastro, plano_id) 
                       VALUES (:nome, :email, :senha, :foto, :nivel, :data_cadastro, :plano_id)";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(":senha", $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $usuario['foto'], PDO::PARAM_STR);
        $stmt->bindParam(":nivel", $usuario['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(":data_cadastro", $usuario['data_cadastro'], PDO::PARAM_STR);
        $stmt->bindParam(":plano_id", $usuario['plano_id'], PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


function buscarUsuario($id)
{
    $db = conexao();

    $sql = "SELECT * FROM usuarios WHERE id=:id";

    //cláusula INNER JOIN para obtermos os dados relacionados das duas tabelas
    //Inner Join - Funções de Agregações / alias apelido
    //$sql = "SELECT usuarios.*,planos.titulo as titulo_plano FROM usuarios INNER JOIN planos ON usuarios.plano_id = planos.id WHERE usuarios.id = :id";

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


function editarUsuario($usuario, $id)
{

    $db = conexao();
    $sql = "UPDATE usuarios

                  SET nome = :nome,
                      email = :email,
                      senha = :senha,
                      foto = :foto,
                      nivel = :nivel,
                      plano_id = :plano_id 

                WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(":senha", $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $usuario['foto'], PDO::PARAM_STR);
        $stmt->bindParam(":nivel", $usuario['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(":plano_id", $usuario['plano_id'], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}

function salvarTokenUsuario($token, $id)
{

    $db = conexao();
    $sql = "UPDATE usuarios
               SET token = :token
               WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":token", $token, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}





function deletarUsuario($id)
{
    $db = conexao();
    $sql = "DELETE FROM usuarios WHERE id=:id";
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

function consultarDadoUsuario($busca)
{
    $db = conexao();
    $sql = "SELECT * FROM usuarios WHERE email=:email OR token=:token";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam("email", $busca);
        $stmt->bindParam("token", $busca);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        die($e->getMessage());
        return false;
    }
}


function validacaoUsuario($editar = false)
{

    $validacao = true;

    if ($_POST['nome'] == "") {
        $_SESSION['nome'] = 'Campo Obrigatório';
        $validacao = false;
    }
    if ($_POST['email'] == "") {
        $_SESSION['email'] = 'Campo Obrigatório';
        $validacao = false;
    }

    if ($_POST['senha'] == "" && strpos($_SERVER['REQUEST_URI'], 'editar') != true) {
        $_SESSION['senha'] = 'Campo Obrigatório';
        $validacao = false;
    }

    return $validacao;
}
