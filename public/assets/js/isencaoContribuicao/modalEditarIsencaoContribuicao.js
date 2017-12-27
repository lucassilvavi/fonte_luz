$("#tb_Insencao_contribuicao ").on('click', '.editarIsencao', function () {
    var co_seq_isencao_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/isencao/modalEditar/" + co_seq_isencao_contribuicao,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Editar Isenção de Contribuição');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});