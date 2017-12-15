$("#tb_tesouraria ").on( 'click', '.confirma_contribuicao', function () {
    var co_seq_controle_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/tesouraria/formConfirmaContribuicao/"+co_seq_controle_contribuicao,
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Deseja confirmar está contribuição ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});