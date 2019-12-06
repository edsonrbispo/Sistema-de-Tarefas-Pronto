 <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
     <div class="form-group">
         <label for="nome">Nome</label>
         <input type="nome" name="nome" id="nome" class="form-control" placeholder="Digite o Nome" value="<?= $usuario['nome'] ?? '' ?>" autofocus>
         <small class="text-danger">
             <?php
                if (isset($_SESSION['nome'])) {
                    echo $_SESSION['nome'];
                    unset($_SESSION['nome']);
                }

                ?>
         </small>
     </div>

     <div class="form-group">
         <label for="email">E-mails</label>
         <input type="email" name='email' id="email" class="form-control" value="<?= $usuario['email'] ?? '' ?>" placeholder="Digite o E-mail">
         <?= formErro('email'); ?>
     </div>


     <div class="form-group">
         <label for="senha">Senha</label>
         <input type="password" name="senha" id="senha" class="form-control" value="<?= $usuario['senha'] ?? '' ?>" placeholder="Digite sua senha">
         <?= formErro('senha'); ?>
     </div>

     <div class="form-group">
         <label for="nivel">Nível</label>
         <select name="nivel" id="ninel" class="form-control">
             <option value="0" <?= (@$usuario['nivel'] == 0) ? 'selected' : '' ?>>Cliente</option>
             <option value="1" <?= (@$usuario['nivel'] == 1) ? 'selected' : '' ?>>Administrador</option>
         </select>
     </div>

     <div class="form-group">
         <label for="plano_id">Planos Selecionado</label>
         <select name="plano_id" id="plano_id" class="form-control">
             <?php foreach ($planos as $plan) : ?>
                 <option value="<?= $plan['id'] ?>" <?= ($plan['id'] == @$usuario['plano_id']) ? 'selected' : '' ?>>
                     <?= $plan['titulo'] . " - R$ " . number_format($plan['valor'], 2, ',', '.') ?>
                 </option>
             <?php endforeach; ?>
         </select>
     </div>

     <div class="form-group">
         <!--  enctype="multipart/form-data" - atributo do form para campo file -->
         <!--  accept="image/x-png, image/jpeg" -->
         <label for="foto">Foto do Perfil</label>
         <input type="file" name="foto" class="form-control" accept="image/x-png, image/jpeg">
         <p class="alert alert-warning">Permitido apenas imagem *.png e *jpg, recomendamos o tamanho 200x200px</p>
     </div>

     <button class="btn btn-primary" type="submit">Salvar</button>
     <a class="btn btn-light" href="/admin/usuario">Cancelar</a>
 </form>