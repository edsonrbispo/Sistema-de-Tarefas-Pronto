 <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
     <div class="form-group">
         <label for="titulo">Titulo</label>
         <input type="titulo" name="titulo" id="titulo" class="form-control" value="<?= $plano['titulo'] ?? '' ?>" placeholder="Digite o titulo" autofocus>
         <?= formErro('titulo'); ?>
     </div>

     <div class="form-group">
         <label for="valor">Valor</label>
         <input type="valor" name='valor' id="valor" class="form-control col-sm-4 valor" value="<?= $plano['valor'] ?? '' ?>" placeholder="Digite o valor">
         <?= formErro('valor'); ?>
     </div>

     <div class="form-group">
         <label for="descricao">Descrição</label>
         <textarea name="descricao" id="descricao" class="form-control" rows="5"><?= $plano['descricao'] ?? '' ?></textarea>
         <?= formErro('descricao'); ?>
     </div>

     <button class="btn btn-primary" type="submit">Salvar</button>
     <a class="btn btn-light" href="/admin/plano">Cancelar</a>
 </form>