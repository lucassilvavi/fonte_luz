$("#tableEntradaSaida ").on('click', '.estornarEntradaSaida', function () {

    let co_seq_financeiro = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalEditar/" + co_seq_financeiro,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente estornar está entrada ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

