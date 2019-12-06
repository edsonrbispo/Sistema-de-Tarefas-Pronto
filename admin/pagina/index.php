<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/PaginaController.php";


if (isset($_GET['deletar'])) {
    deletar($_GET['deletar']);
} else {
    $paginas = index();
}


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Lista de Páginas</h3>

            <div class="row">
                <div class="col-12 text-right p-3">
                    <a class="btn btn-primary" href="/admin/pagina/cadastrar"><i class="fas fa-plus"></i> Adicionar</a>
                </div>
            </div>


            <?php if (isset($_SESSION['mensagem'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensagem'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['mensagem']);
            endif;
            ?>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">slug</th>
                        <th scope="col" width="140" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($paginas as $pg) : ?>
                        <tr>
                            <th scope="row"><?= $pg['id'] ?></th>
                            <td><?= $pg['titulo'] ?></td>
                            <td><?= $pg['slug'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/pagina/visualizar?id=<?= $pg['id'] ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="/admin/pagina/editar?id=<?= $pg['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger deletar" href="/admin/pagina/index?deletar=<?= $pg['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>