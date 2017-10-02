/**
 * Modal de cadastro de membro
 */

function modalCadPermissao() {
    $.ajax({
        type: "get",
        url: "/formPermissao/PermissaoController@savePermissao",
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Cadastrar Permissão');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
};
