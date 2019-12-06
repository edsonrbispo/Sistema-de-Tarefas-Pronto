<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Pagina.php";

checarLogado();

function index()
{

    $paginas = listarPaginas();
    return $paginas;
}

function visualizar()
{

    $id = $_GET['id'];
    $pagina = buscarPagina($id);
    return $pagina;
}

function cadastrar()
{


    $pagina = [];

    if (!empty($_POST)) {

        $pagina['titulo'] = $_POST['titulo'];
        $pagina['slug'] = $_POST['slug'];
        $pagina['descricao'] = $_POST['descricao'];

        if (validacaoPagina()) {
            if (cadastrarPagina($pagina)) {

                $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso!';

                header('Location:/admin/pagina');
                exit;
            }
        }
    }

    return $pagina;
}

function editar()
{


    $id = $_GET['id'];

    $pagina = buscarPagina($id);

    if (!empty($_POST)) {

        $pagina['titulo'] = $_POST['titulo'];
        $pagina['slug'] = $_POST['slug'];
        $pagina['descricao'] = $_POST['descricao'];

        if (validacaoPagina()) {
            if (editarPagina($pagina, $id)) {

                $_SESSION['mensagem'] = 'Usuário editado com sucesso!';

                header('Location:/admin/pagina');
                exit;
            }
        }
    }

    return $pagina;
}

function deletar($id)
{
    if (deletarPagina($id)) {

        $_SESSION['mensagem'] = 'Usuário deletado com sucesso!';
        header('Location:/admin/pagina');
        exit;
    }
}

function validacaoPagina()
{

    $validacao = true;

    if ($_POST['titulo'] == "") {
        $_SESSION['titulo'] = 'Campo Obrigatório';
        $validacao = false;
    }

    if ($_POST['slug'] == "") {
        $_SESSION['slug'] = 'Campo Obrigatório';
        $validacao = false;
    }

    if ($_POST['descricao'] == "") {
        $_SESSION['descricao'] = 'Campo Obrigatório';
        $validacao = false;
    }

    return $validacao;
}
