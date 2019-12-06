   <?php if (isset($_SESSION['mensagem'])) : ?>

       <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
           <?= $_SESSION['mensagem'] ?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>

   <?php
        unset($_SESSION['mensagem']);
    endif;
    ?>