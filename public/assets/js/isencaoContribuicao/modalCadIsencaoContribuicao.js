function modalCadIsencaoContribuicao(){
    $.ajax({
        type: "get",
        url: "/isencao/modalCadastro",
        beforeSend: function() {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function(dados)
        {
            $(".modal-title").html('Cadastrar Isenção de Contribuição');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
}