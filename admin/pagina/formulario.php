 <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
     <div class="form-group">
         <label for="titulo">Titulo</label>
         <input type="titulo" name="titulo" id="titulo" class="form-control" value="<?= $pagina['titulo'] ?? '' ?>" placeholder="Digite o titulo" autofocus>
         <small class="text-danger">
             <?php
                if (isset($_SESSION['titulo'])) {
                    echo $_SESSION['titulo'];
                    unset($_SESSION['titulo']);
                }

                ?>
         </small>
     </div>

     <div class="form-group">
         <label for="slug">Slug</label>
         <input type="slug" name='slug' id="slug" class="form-control" value="<?= $pagina['slug'] ?? '' ?>" placeholder="Digite o Slug">
         <small class="text-danger">
             <?php
                if (isset($_SESSION['slug'])) {
                    echo $_SESSION['slug'];
                    unset($_SESSION['slug']);
                }

                ?>
         </small>
     </div>

     <div class="form-group">
         <label for="descricao">Descrição</label>
         <textarea name="descricao" id="descricao" class="form-control" rows="5"><?= $pagina['descricao'] ?? '' ?></textarea>
         <?= formErro('descricao'); ?>
     </div>

     <button class="btn btn-primary" type="submit">Salvar</button>
     <a class="btn btn-light" href="/admin/pagina">Cancelar</a>
 </form>