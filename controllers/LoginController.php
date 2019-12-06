<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/helpers/Config.php";

require  $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

function validarLogin()
{

    $login = null;

    if (isset($_SESSION['usuario'])) {
        header('Location:/admin');
        exit;
    }

    if (isset($_COOKIE['manterLogado'])) {

        $usuario = consultarDadoUsuario($_COOKIE['manterLogado']);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header('Location:/admin');
            exit;
        }
    }


    if (!empty($_POST)) {

        $login = [
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'manterLogado' => $_POST['manterLogado'] ?? 0
        ];

        $usuario = consultarDadoUsuario($login['email']);

        if ($usuario) {

            if (password_verify($login['senha'], $usuario['senha'])) {

                $_SESSION['usuario'] = $usuario;

                if ($login['manterLogado']) {
                    $token = md5(uniqid(rand(), true));
                    setcookie('manterLogado', $token, time() + 3600 * 24); //1 dia
                    salvarTokenUsuario($token, $usuario['id']);
                }

                header('Location:/admin');
                exit;
            } else {
                $_SESSION['mensagem'] = 'Usuário ou senha inválido!';
                return $login;
            }
        } else {
            $_SESSION['mensagem'] = 'Usuário ou senha inválido!';
            return $login;
        }
    }

    return $login;
}


function logout()
{
    if (isset($_SESSION['usuario']) || isset($_COOKIE['manterLogado'])) {
        unset($_SESSION['usuario']);
        setcookie('manterLogado', null, time() - 3600 * 24);
        header('Location: /login/entrar');
        exit;
    } else {
        header('Location: /');
        exit;
    }
}
