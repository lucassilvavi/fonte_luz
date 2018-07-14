$("#tb_tesouraria ").on( 'click', '.observacao', function () {
    let co_seq_controle_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/tesouraria/formObservacao/"+co_seq_controle_contribuicao,
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Observação');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});