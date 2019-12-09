<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require_once  $_SERVER['DOCUMENT_ROOT'] . "/models/Pagina.php";

require_once  $_SERVER['DOCUMENT_ROOT'] . "/models/Plano.php";

require_once  $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

function pagina($slug)
{
    $pagina = buscarSlug($slug);
    return $pagina;
}

function planos()
{
    $planos = listarPlanos();
    return $planos;
}

function planoEscolhido($id)
{
    $plano = buscarPlano($id);
    return $plano;
}


function contratar()
{
    $usuario = [];

    if (!empty($_POST)) {

        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => ($_POST['senha'] != "") ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $_POST['senha'],
            'nivel' => 0,
            'plano_id' => $_POST['plano_id'],
            'data_cadastro' => date("Y-m-d H:i:s"),
            'foto' => 'default.jpg'
        ];

        if (cadastrarUsuario($usuario)) {

            $_SESSION['mensagem'] = 'Registro realizado com sucesso! <br> Efetue o login para entrar.';

            header('Location:/login/entrar');
            exit;
        }
    }

    return $usuario;
}
