<?php

session_start();

require_once 'Funcoes.php';

define('BANCO_DE_DADOS', $_SERVER['DOCUMENT_ROOT'] . '/database/Conexao.php');

define('CABECALHO', $_SERVER['DOCUMENT_ROOT'] . '/includes/cabecalho.php');

define('RODAPE', $_SERVER['DOCUMENT_ROOT'] . '/includes/rodape.php');

define('ALERTA', $_SERVER['DOCUMENT_ROOT'] . '/includes/alerta.php');
