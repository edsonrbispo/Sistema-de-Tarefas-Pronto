<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/SiteController.php";

$pagina = pagina('sobre-nos');

?>
<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">
        <div class="col-12">
            <h3 class="text-center mt-4"><?= $pagina['titulo'] ?></h3>
            <?= $pagina['descricao'] ?>
        </div>

    </div>
</main>

<?php include_once(RODAPE); ?>