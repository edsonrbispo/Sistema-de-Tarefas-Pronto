<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/SiteController.php";

$plano = planoEscolhido($_GET['id']);

$usuario = contratar();

?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">

        <div class="col-sm-7 mx-auto">

            <h3 class="text-center m-4">Contratar um Plano</h3>

            <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="nome" name="nome" id="nome" value="<?= $usuario['nome'] ?? '' ?>" class="form-control" placeholder="Digite o Nome" required autofocus>
                    <?= formErro('nome'); ?>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="email">E-mails</label>
                        <input type="email" name='email' value="<?= $usuario['email'] ?? '' ?>" id="email" class="form-control" placeholder="Digite o E-mail" required autofocus>
                        <?= formErro('email'); ?>
                    </div>

                    <div class="col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" value="<?= $usuario['senha'] ?? '' ?>" class="form-control" placeholder="Digite sua senha" required>
                        <?= formErro('password'); ?>
                    </div>
                </div>

                <div class="form-group mt-4 bg-light p-3 border border-info">
                    <label for="plano">Planos Selecionado</label>
                    <input name="plano" id="plano" class="form-control" value="<?= $plano['titulo'] . " - R$ " . number_format($plano['valor'], 2, ',', '.') ?>" readonly>
                    <input type="hidden" name="plano_id" id="plano_id" class="form-control" value='<?= $_GET['id'] ?>'>
                    </input>
                </div>


                <div class="mt-4 text-center">

                    <button class="btn btn-lg btn-primary" type="submit">Contratar</button>

                </div>
            </form>

        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>