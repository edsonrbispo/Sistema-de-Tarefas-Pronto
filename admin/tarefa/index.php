<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/TarefaController.php";


if (isset($_GET['deletar'])) {
    deletar($_GET['deletar']);
} else {
    $tarefas = index();
}
?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-9 mx-auto">

            <h3 class="text-center mt-4">Minha Lista de Tarefas</h3>

            <div class="row mt-5 mb-2">
                <div class="col-md-10">

                    <form class="form-row" action="<?= $_SERVER['REQUEST_URI']; ?>" method="get">


                        <div class="col-md-5">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                                </div>
                                <input type="text" name="buscar" class="form-control" id="inlineFormInputGroup" placeholder="Perquisar...">
                            </div>
                        </div>
                        <div class="col-md-5 text-center">
                            <select name="status" id="status" class="form-control">
                                <option value="todos">Todos</option>
                                <option value="0">Em Processo</option>
                                <option value="1">Finalizado</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary">Pesquisar</button>
                        </div>
                    </form>
                </div>
                <div class=" col-md-2 text-right">
                    <a class="btn btn-primary" href="/admin/tarefa/cadastrar"><i class="fas fa-plus"></i> Adicionar</a>
                </div>
            </div>



            <?php include_once ALERTA; ?>



            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="10">#</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col" class="text-center" width="140">Prioridade</th>
                        <th scope="col" class="text-center" width="140">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tarefas as $tar) : ?>
                        <tr>
                            <th scope="row" class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input atualizarStatus" id="<?= $tar['id'] ?>" name="<?= $tar['id'] ?>" <?= $tar['status'] == 1 ? 'checked' : ''; ?>>
                                    <label class="custom-control-label" for="<?= $tar['id'] ?>"></label>
                                </div>
                            </th>
                            <td id='tarefa-<?= $tar['id'] ?>' class="<?= $tar['status'] == 1 ? 'finalizada' : ''; ?>"><?= $tar['tarefa'] ?></td>
                            <td class="text-center"><?= $tar['prioridade'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/tarefa/visualizar?id=<?= $tar['id'] ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="/admin/tarefa/editar?id=<?= $tar['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger deletar" href="/admin/tarefa?deletar=<?= $tar['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>


        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>