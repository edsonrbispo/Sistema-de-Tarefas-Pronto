<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/PlanoController.php';

$plano = visualizar($_GET['id']);


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Detalhes do Plano</h3>

            <table class="table table-striped mt-3">
                <tr>
                    <th width="180">Título</th>
                    <td><?= $plano['titulo'] ?></td>
                </tr>
                <tr>
                    <th width="100">Valor</th>
                    <td>R$ <?= number_format($plano['valor'], 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <th width="100">Descrição</th>
                    <td><?= $plano['descricao'] ?></td>
                </tr>
            </table>

            <div class="row">
                <div class="col-12 p-3">
                    <a class="btn btn-primary" href="/admin/plano/editar?id=<?= $plano['id'] ?>">Editar</a>
                    <a class=" btn btn-light" href="/admin/plano">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>