$(".detalhes").click(function () {
    let co_permissao = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalDetalhePermissao/"+co_permissao,
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Perfis vinculado a essa permissão');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});
