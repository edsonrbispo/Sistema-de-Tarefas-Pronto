<?php

require_once 'helpers/Config.php';

// require_once BANCO_DE_DADOS;

// $db = conexao();

// if ($db) {
//     echo "Conectado";
// } else {
//     echo "Falha na conexao";
// }





?>

<?php include_once(CABECALHO); ?>

<main class="container mt-5 mb-5">

    <div class="row">
        <div class="col-lg-5 mx-auto text-center">
            <img src="/assets/img/logo.png" alt="todolist" width="150">
        </div>
    </div>

    <div class="row">
        <div class="col-12 mx-auto text-center mt-4 text-primary">
            <h1>Organize tudo
                com o Sistema TodoList</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-10 mx-auto text-center mt-3">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui blanditiis ipsa quo neque velit, suscipit optio doloribus ab mollitia, impedit amet, laudantium cum ea placeat tempore excepturi. Corporis, porro ullam?</p>
        </div>
    </div>

    <div class="row">
        <div class="col-10 mx-auto text-center mt-3">
            <a href="/planos" class="btn btn-lg btn-primary">Conheça Nossos Planos</a>
        </div>
    </div>


</main>

<?php include_once(RODAPE); ?>