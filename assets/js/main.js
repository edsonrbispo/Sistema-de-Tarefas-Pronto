$(document).ready(function () {

    //https://igorescobar.github.io/jQuery-Mask-Plugin/ 
    $('.valor').mask("#.##0,00", { reverse: true });
    
    //https://summernote.org/deep-dive/    google: summernote basic toolbar

    $('#descricao').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture']]
        ],
        lang: 'pt-BR',
        height: 200, // set editor height

    });


    $('.deletar').on('click', function (e) {

        var resposta = confirm('Deseja deletar o registro');
        if (!resposta) {
            e.preventDefault();
        }
        
    })

    $('.atualizarStatus').on('click', function () {
        console.log($(this).attr('id'));
        
        var id = $(this).attr('id');
        
        $.get({
            type: "GET",
            url: '/admin/tarefa/atualizar-status.php',
            data: {id:id},
            success: function (resposta) {
                console.log(resposta);
                $('#tarefa-' + id).toggleClass('finalizada');
            }
        });

        
    })


})