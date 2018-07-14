$(".btnExcluirHabilidade").click(function () {
    let co_seq_usuario_profissao = $(this).val();
        $.ajax({
            type: "get",
            url: "/formDesableHabilidade/" + co_seq_usuario_profissao,
            beforeSend: function () {
                $('#myModal').modal('show');
                $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
            },
            success: function (dados) {
                $(".modal-title").html('Deseja realmente excluir está habilidade?');
                $("#myModal").modal('show');
                $("#conteudoModal").html(dados);
            }
        });
});
