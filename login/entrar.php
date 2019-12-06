<?php


require_once  $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

$login = validarLogin();


?>

<?php include_once(CABECALHO); ?>

<main class="container">

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

            <h3 class="text-center m-5">Fazer Login</h3>

            <?php
            if (isset($_SESSION['mensagem'])) :
                ?>
                <div class="alert alert-danger text-center">
                    <?php
                        echo $_SESSION['mensagem'];
                        unset($_SESSION['mensagem']);
                        ?>
                </div>

            <?php
            endif;
            ?>

            <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= $login['email'] ?? '' ?>" class="form-control" placeholder="Digite seu E-mail" autofocus>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" value="<?= $login['senha'] ?? '' ?>" class="form-control" placeholder="Digite sua senha">
                </div>

                <div class="custom-control custom-checkbox mt-3 mb-3">
                    <input type="checkbox" name="manterLogado" class="custom-control-input" id="lembrame">
                    <label class="custom-control-label" for="lembrame">Lembra-me</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
            </form>

        </div>
    </div>
</main>


<?php include_once(RODAPE); ?>