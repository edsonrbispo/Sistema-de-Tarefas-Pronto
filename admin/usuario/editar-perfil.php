<?php


require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuario = editarPerfil();


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center m-4">Editar Perfil</h3>

            <div class="row">
                <div class="col-12 text-center p-3">
                    <img src="/uploads/perfil/<?= $usuario['foto'] ?>" class="rounded-circle" width="150" height="150" alt="">
                </div>
            </div>

            <?php include 'formularioPerfil.php' ?>

        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>