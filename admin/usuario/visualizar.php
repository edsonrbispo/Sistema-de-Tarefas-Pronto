<?php


require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuario = visualizar($_GET['id']);


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Detalhes do Usuário</h3>

            <div class="row">
                <div class="col-12 text-center p-3">
                    <img src="/uploads/perfil/<?= $usuario['foto'] ?>" class="rounded-circle" width="150" height="150" alt="">
                </div>
            </div>


            <table class="table table-striped">
                <tr>
                    <th width="180">Nome</th>
                    <td><?= $usuario['nome'] ?></td>
                </tr>
                <tr>
                    <th width="100">E-mail</th>
                    <td><?= $usuario['email'] ?></td>
                </tr>
                <tr>
                    <th width="100">Nível</th>
                    <td><?= $usuario['nivel'] ?></td>
                </tr>
                <tr>
                    <th width="100">Plano</th>
                    <td><?= $usuario['plano_id'] ?></td>
                </tr>
                <tr>
                    <th width="100">Data Cadastro</th>
                    <td><?= date('d/m/Y H:i:s', strtotime($usuario['data_cadastro'])) ?></td>
                </tr>
            </table>

            <div class="row">
                <div class="col-12 p-3">
                    <a class="btn btn-primary" href="/admin/usuario/editar?id=<?= $usuario['id'] ?>">Editar</a>
                    <a class="btn btn-light" href="/admin/usuario">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>