<?php

require_once BANCO_DE_DADOS;

function listarPaginas()
{
    $db = conexao();

    //Ordernar por ordem de cadastro
    //$sql = "SELECT * FROM paginas ORDER BY paginas.id DESC";

    $sql = "SELECT * FROM paginas ORDER BY paginas.id DESC";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_OBJ
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}



function cadastrarPagina($pagina)
{
    if (validacaoPagina($pagina))
        return false;

    $db = conexao();
    $sql = "INSERT INTO paginas (titulo, slug, descricao) 
                       VALUES (:titulo, :slug, :descricao)";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":titulo", $pagina['titulo']);
        $stmt->bindParam(":slug", $pagina['slug']);
        $stmt->bindParam(":descricao", $pagina['descricao']);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


function buscarPagina($id)
{
    $db = conexao();

    $sql = "SELECT * FROM paginas WHERE id=:id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        die($e->getMessage());
        return false;
    }
}

function buscarSlug($slug)
{
    $db = conexao();

    $sql = "SELECT * FROM paginas WHERE slug=:slug";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":slug", $slug);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        die($e->getMessage());
        return false;
    }
}

function editarPagina($pagina, $id)
{

    if (validacaoPagina($pagina))
        return false;

    $db = conexao();
    $sql = "UPDATE paginas

                  SET titulo=:titulo,
                      slug=:slug, 
                      descricao=:descricao 

                WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":titulo", $pagina['titulo']);
        $stmt->bindParam(":slug", $pagina['slug']);
        $stmt->bindParam(":descricao", $pagina['descricao']);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}





function deletarPagina($id)
{
    $db = conexao();

    $sql = "DELETE FROM paginas WHERE id=:id";
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}


function validacaoPagina($pagina)
{

    $validacao = false;

    if ($pagina['titulo'] == "") {
        $_SESSION['titulo'] = 'Campo Obrigatório';
        $validacao = true;
    }

    if ($pagina['slug'] == "") {
        $_SESSION['slug'] = 'Campo Obrigatório';
        $validacao = true;
    }

    if ($pagina['descricao'] == "") {
        $_SESSION['descricao'] = 'Campo Obrigatório';
        $validacao = true;
    }

    return $validacao;
}
