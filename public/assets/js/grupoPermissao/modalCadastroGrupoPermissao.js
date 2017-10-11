
function modalCadGrupoPermissao() {
    $.ajax({
        type: "get",
        url: "/formGrupoPermissao",
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Cadastrar Grupo de Permissão');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
};
