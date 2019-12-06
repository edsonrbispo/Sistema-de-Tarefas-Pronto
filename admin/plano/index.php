<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/PlanoController.php";


if (isset($_GET['deletar'])) {
    deletar($_GET['deletar']);
} else {
    $planos = index();
}


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Lista de Planos</h3>

            <div class="row">
                <div class="col-12 text-right p-3">
                    <a class="btn btn-primary" href="/admin/plano/cadastrar"><i class="fas fa-plus"></i> Adicionar</a>
                </div>
            </div>


            <?php include_once ALERTA; ?>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Valor</th>
                        <th scope="col" width="140" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($planos as $plan) : ?>
                        <tr>
                            <th scope="row"><?= $plan['id'] ?></th>
                            <td><?= $plan['titulo'] ?></td>
                            <td>R$ <?= number_format($plan['valor'], 2, ',', '.') ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/plano/visualizar?id=<?= $plan['id'] ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="/admin/plano/editar?id=<?= $plan['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger deletar" href="/admin/plano?deletar=<?= $plan['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>
    </m>


    <?php include_once(RODAPE); ?>