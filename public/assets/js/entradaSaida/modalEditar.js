$("#tableEntradaSaida ").on('click', '.editarEntradaSaida', function () {

    let co_seq_financeiro = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalCadEntradaSaida/" + co_seq_financeiro+"/"+"EntradaSaidaController@editar",
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Editar Entrada e Saída');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

