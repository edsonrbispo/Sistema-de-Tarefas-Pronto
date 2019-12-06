<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";


if (isset($_GET['deletar'])) {
    deletar($_GET['deletar']);
} else {
    $usuarios = index();
}


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Lista de Usuário</h3>

            <div class="row">
                <div class="col-12 text-right p-3">
                    <a class="btn btn-primary" href="/admin/usuario/cadastrar"><i class="fas fa-plus"></i> Adicionar</a>
                </div>
            </div>


            <?php include_once ALERTA; ?>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Nível</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['nome'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['nivel'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/usuario/visualizar?id=<?= $user['id'] ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="/admin/usuario/editar?id=<?= $user['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger deletar" href="/admin/usuario?deletar=<?= $user['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>