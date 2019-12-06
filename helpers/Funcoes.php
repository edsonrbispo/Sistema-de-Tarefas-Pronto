<?php

function formErro($campo)
{
    if (isset($_SESSION[$campo])) {
        echo '<small class="text-danger">';
        echo $_SESSION[$campo];
        unset($_SESSION[$campo]);
        echo '</small>';
    }
}

function checarLogado()
{
    if (!isset($_SESSION['usuario'])) {
        header('Location:/login/entrar');
        exit;
    }
}
