<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Plano.php";

checarLogado();

function index()
{

    $planos = listarPlanos();
    return $planos;
}

function visualizar($id)
{
    $plano = buscarPlano($id);
    return $plano;
}

function cadastrar()
{

    $plano = [];

    if (!empty($_POST)) {

        $plano = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'valor' => str_replace(',', '.', str_replace('.', '', $_POST['valor'])),
        ];

        if (cadastrarPlano($plano)) {

            $_SESSION['mensagem'] = 'Plano cadastrado com sucesso!';

            header('Location:/admin/plano');
            exit;
        }
    }

    return $plano;
}

function editar($id)
{

    $plano = buscarPlano($id);

    if (!empty($_POST)) {

        $plano = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'valor' => str_replace(',', '.', str_replace('.', '', $_POST['valor'])),
        ];

        if (editarPlano($plano, $id)) {

            $_SESSION['mensagem'] = 'Plano editado com sucesso!';

            header('Location:/admin/plano');
            exit;
        }
    }

    return $plano;
}

function deletar($id)
{
    if (deletarPlano($id)) {

        $_SESSION['mensagem'] = 'Plano deletado com sucesso!';
        header('Location:/admin/plano');
        exit;
    }
}
