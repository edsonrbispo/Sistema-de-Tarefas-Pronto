<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/SiteController.php";

$pagina = pagina('planos');
$planos = planos();

?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">
        <div class="col-12 text-center">
            <h3 class="m-4"><?= $pagina['titulo'] ?></h3>

            <?= $pagina['descricao'] ?>
        </div>
    </div>

    <div class="row mt-5">
        <?php foreach ($planos as $plan) : ?>
            <div class="col-md-4 text-center">
                <h4><?= $plan['titulo'] ?></h4>

                <?= $plan['descricao'] ?>

                <p>

                    <strong>R$ <?= number_format($plan['valor'], 2, ',', '.') ?></strong>
                </p>
                <a href="/contratar?id=<?= $plan['id'] ?>" class="btn btn-primary">Contratar</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include_once(RODAPE); ?>