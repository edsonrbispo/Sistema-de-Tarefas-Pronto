<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/TarefaController.php';

$tarefa = visualizar($_GET['id']);


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4 mb-4">Detalhes da Tarefa</h3>

            <table class="table table-striped">
                <tr>
                    <th width="180">Tarefa</th>
                    <td><?= $tarefa['tarefa'] ?></td>
                </tr>

                <tr>
                    <th width="100">Prioridade</th>
                    <td><?= $tarefa['prioridade'] ?></td>
                </tr>
                <tr>
                    <th width="100">Status</th>
                    <td><?= $tarefa['status'] ? 'Finalizado' : 'Em Processo' ?></td>
                </tr>
                <tr>
                    <th width="100">Descrição</th>
                    <td><?= $tarefa['descricao'] ?></td>
                </tr>
                <tr>
                    <th width="100">Data Cadastro</th>
                    <td><?= date('d/m/Y H:i:s', strtotime($tarefa['data_cadastro'])) ?></td>
                </tr>
            </table>

            <div class="row">
                <div class="col-12 p-3">
                    <a class="btn btn-primary" href="/admin/tarefa/editar?id=<?= $tarefa['id'] ?>">Editar</a>
                    <a class="btn btn-light" href="/admin/tarefa">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>