$("#excluitConta").click(function () {

    let idUsuario = $('.idUsuario').val();
    $.ajax({
        type: "get",
        url: "/modalExluirPerfil/" + idUsuario,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente Exluir a sua conta ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

