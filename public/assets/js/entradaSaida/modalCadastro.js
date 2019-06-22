$(".inserirLancamento").click(function () {

    $.ajax({
        type: "get",
        url: "/modalCadEntradaSaida",
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Cadastrar Entrada e Saída');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

