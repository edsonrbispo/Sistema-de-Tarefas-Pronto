<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/UsuarioController.php';

$usuario = editar();

$planos = carregarPlanos();

//var_dump($pagina);

?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center m-4">Editar Usuário</h3>

            <?php include 'formulario.php' ?>

        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>