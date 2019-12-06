<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Gerenciamento de Tarefas</title>
    <link rel="icon" type="image/png" href="assets/img/logo-icon.png" />

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/estilo.css">

</head>

<body>

    <header class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">

                <img src="/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">

                <strong>TodoList</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/sobre-nos">Sobre nós</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/planos">Planos</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">

                    <?php if (isset($_SESSION['usuario'])) : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/tarefa">Minhas Tarefas</a>
                        </li>

                        <?php if ($_SESSION['usuario']['nivel'] == 1) : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/admin/pagina">Páginas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/plano">Planos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/admin/usuario">Usuários</a>
                            </li>

                        <?php endif; ?>

                    <?php endif; ?>

                    <li class="nav-item ml-2">

                        <?php if (isset($_SESSION['usuario'])) : ?>
                            <a href="/admin/usuario/editar-perfil">


                                <img src="/uploads/perfil/<?= $_SESSION['usuario']['foto'] ?>" class="rounded-circle" width="40" height="40" alt="">

                                <?= $_SESSION['usuario']['nome'] ?> |
                            </a>

                            <a class="btn btn-link" href="/login/logout">Sair</a>

                        <?php else : ?>

                            <a class="btn btn-primary" href="/login/entrar">Entrar</a>

                        <?php endif; ?>
                    </li>

                </ul>

            </div>
        </nav>
    </header>