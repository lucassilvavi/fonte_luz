$("#tb_home ").on( 'click', '.edtComprovantes', function () {
    var co_seq_controle_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/formEditaComprovante/"+co_seq_controle_contribuicao,
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Comprovantes');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});