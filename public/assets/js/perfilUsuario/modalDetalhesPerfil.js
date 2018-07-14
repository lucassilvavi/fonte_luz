$(".detalhes").click(function () {
    let co_perfil = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalPerfilPermissao/"+co_perfil,
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Permissões');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});
