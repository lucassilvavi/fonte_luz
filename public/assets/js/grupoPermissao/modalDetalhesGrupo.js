$(".detalhes").click(function () {
    var co_seq_grupo_permissoes = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalGrupoPermissao/"+co_seq_grupo_permissoes,
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
