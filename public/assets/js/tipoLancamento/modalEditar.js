$("#tb_tipo_contribuicao ").on('click', '.editTipoContribuicao', function () {
    let co_seq_tipo_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalEditTipoLancamento/" + co_seq_tipo_contribuicao,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Cadastrar Tipo Lançamento');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});
