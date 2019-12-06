<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Plano.php";

checarLogado();

function index()
{

    $usuarios = listarUsuarios();
    return $usuarios;
}

function visualizar()
{
    $id = $_GET['id'];
    $usuario = buscarUsuario($id);
    return $usuario;
}

function cadastrar()
{
    $usuario = [];

    if (!empty($_POST)) {

        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => ($_POST['senha'] != "") ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $_POST['senha'],
            'nivel' => $_POST['nivel'],
            'plano_id' => $_POST['plano_id'],
            'foto' => 'default.jpg',
            'data_cadastro' => date("Y-m-d H:i:s"),
        ];

        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $extensao = strtolower(substr($_FILES['foto']['name'], -4));
            $novo_nome = md5(rand()) . $extensao;
            $dir =  $_SERVER['DOCUMENT_ROOT'] . "/uploads/perfil/";
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novo_nome)) {
                $usuario['foto'] = $novo_nome;
            }
        }


        if (validacaoUsuario()) {
            if (cadastrarUsuario($usuario)) {

                $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso!';

                header('Location:/admin/usuario');
                exit;
            }
        }
    }

    return $usuario;
}

function carregarPlanos()
{
    $planos = listarPlanos();
    return $planos;
}


function editar()
{
    $id = $_GET['id'];

    $usuario = buscarUsuario($id);

    if (!empty($_POST)) {

        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'nivel' => $_POST['nivel'],
            'plano_id' => $_POST['plano_id'],
            'foto' => $usuario['foto'],
            'senha' => $usuario['senha']
        ];

        if (!empty($_POST['senha'])) {
            $usuario['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }


        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $extensao = strtolower(substr($_FILES['foto']['name'], -4));
            $novo_nome = md5(rand()) . $extensao;
            $dir =  $_SERVER['DOCUMENT_ROOT'] . "/uploads/perfil/";
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novo_nome)) {

                $usuario['foto'] = $novo_nome;
            } else {

                $usuario['foto'] = 'default.jpg';
            }
        }


        if (validacaoUsuario()) {
            if (editarUsuario($usuario, $id)) {

                $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso!';

                header('Location:/admin/usuario');
                exit;
            }
        }
    }

    $usuario['senha'] = '';
    return $usuario;
}


function editarPerfil()
{
    $id = $_SESSION['usuario']['id'];

    $usuario = buscarUsuario($id);

    if (!empty($_POST)) {


        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'nivel' => $_POST['nivel'],
            'plano_id' => $usuario['plano_id'],
            'foto' => $usuario['foto'],
            'senha' => $usuario['senha']
        ];

        if (!empty($_POST['senha'])) {
            $usuario['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }

        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $extensao = strtolower(substr($_FILES['foto']['name'], -4));
            $novo_nome = md5(rand()) . $extensao;
            $dir =  $_SERVER['DOCUMENT_ROOT'] . "/uploads/perfil/";
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novo_nome)) {

                $usuario['foto'] = $novo_nome;
            } else {

                $usuario['foto'] = 'default.jpg';
            }
        }


        if (validacaoUsuario()) {
            if (editarUsuario($usuario, $id)) {

                $_SESSION['usuario'] = buscarUsuario($id);

                $_SESSION['mensagem'] = 'Perfil Atualizado com sucesso!';

                header('Location:/admin/tarefa');
                exit;
            }
        }
    }

    $usuario['senha'] = '';
    return $usuario;
}


function deletar($id)
{
    if (deletarUsuario($id)) {

        $_SESSION['mensagem'] = 'Usuário deletado com sucesso!';
        header('Location:/admin/usuario');
        exit;
    }
}
