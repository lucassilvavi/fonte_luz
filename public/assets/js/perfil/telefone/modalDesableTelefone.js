$(".btnExcluirTelefone").click(function () {
    var co_seq_telefone = $(this).val();
    $.ajax({
        type: "get",
        url: "/formDesableTelefone/" + co_seq_telefone,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente excluir este telefone?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});
