<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Tarefa.php";

checarLogado();

function index()
{
    if (isset($_GET['status']) || isset($_GET['buscar'])) {
        $filtrar = [
            'status' => $_GET['status'],
            'buscar' => $_GET['buscar']
        ];
        $tarefas = listarTarefas($filtrar);
    } else {
        $tarefas = listarTarefas(null);
    }

    return $tarefas;
}

function visualizar()
{

    $id = $_GET['id'];
    $tarefa = buscarTarefa($id);
    return $tarefa;
}

function cadastrar()
{


    $tarefa = [];

    if (!empty($_POST)) {

        $tarefa = [
            'tarefa' => $_POST['tarefa'],
            'descricao' => $_POST['descricao'],
            'prioridade' => $_POST['prioridade'],
            'status' => $_POST['status'],
            'data_cadastro' => date('Y-m-d H:m:s'),
            'usuario_id' => $_SESSION['usuario']['id'],
        ];


        if (cadastrarTarefa($tarefa)) {

            $_SESSION['mensagem'] = 'Tarefa cadastrada com sucesso!';

            header('Location:/admin/tarefa');
            exit;
        }
    }

    return $tarefa;
}

function editar()
{


    $id = $_GET['id'];

    $tarefa = buscarTarefa($id);

    if (!empty($_POST)) {

        $tarefa = [
            'tarefa' => $_POST['tarefa'],
            'descricao' => $_POST['descricao'],
            'prioridade' => $_POST['prioridade'],
            'status' => $_POST['status']
        ];


        if (editarTarefa($tarefa, $id)) {

            $_SESSION['mensagem'] = 'Tarefa editada com sucesso!';

            header('Location:/admin/tarefa');
            exit;
        }
    }

    return $tarefa;
}

function deletar($id)
{
    if (deletarTarefa($id)) {
        $_SESSION['mensagem'] = 'Tarefa deletada com sucesso!';
        header('Location:/admin/tarefa');
        exit;
    }
}


//Requisição Ajax
function atualizarStatus($id)
{
    if (atualizarStatusTarefa($id)) {
        echo 'ok';
    } else {
        echo 'Erro';
    }
}
