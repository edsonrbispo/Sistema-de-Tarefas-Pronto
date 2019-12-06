 <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
     <div class="form-group">
         <label for="tarefa">Tarefa</label>
         <input type="tarefa" name="tarefa" id="tarefa" class="form-control" value="<?= $tarefa['tarefa'] ?? '' ?>" placeholder="Digite o Nome" required autofocus>
         <?= formErro('tarefa'); ?>
     </div>


     <div class="form-row">

         <div class="col-md-7">
             <label for="descricao">Descrição</label>
             <textarea name="descricao" id="descricao" class="form-control" rows="5"><?= $tarefa['descricao'] ?? '' ?></textarea>
         </div>

         <div class="col-md-4 offset-md-1">
             <div class="form-group">
                 <label for="prioridade">Prioridade</label>
                 <select name="prioridade" id="prioridade" class="form-control">
                     <option value="Baixa" <?= @$tarefa['prioridade'] == 'Baixa' ? 'selected' : ''; ?>>Baixa</option>
                     <option value="Normal" <?= @$tarefa['prioridade'] == 'Normal' ? 'selected' : ''; ?>>Normal</option>
                     <option value="Alta" <?= @$tarefa['prioridade'] == 'Alta' ? 'selected' : ''; ?>>Alta</option>
                     <option value="Urgente" <?= @$tarefa['prioridade'] == 'Urgente' ? 'selected' : ''; ?>>Urgente</option>
                 </select>
             </div>

             <div class="form-group">
                 <p>Status</p>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="status1" name="status" value="0" class="custom-control-input" <?= @$tarefa['status'] == 0 ? 'checked' : ''; ?>>
                     <label class="custom-control-label" for="status1">Em Processo</label>
                 </div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="status2" name="status" value="1" class="custom-control-input" <?= @$tarefa['status'] == 1 ? 'checked' : ''; ?>>
                     <label class="custom-control-label" for="status2">Finalizada</label>
                 </div>
             </div>
         </div>



     </div>

     <div class="form-group mt-5">
         <button class="btn btn-primary" type="submit">Salvar</button>
         <a class="btn btn-light" href="/admin/tarefa">Cancelar</a>
     </div>


 </form>