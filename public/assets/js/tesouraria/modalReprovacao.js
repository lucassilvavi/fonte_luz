$("#tb_tesouraria ").on('click', '.reprovar_contribuicao', function () {
    let co_seq_controle_contribuicao = $(this).val();
    $.ajax({
        type: "get",
        url: "/tesouraria/formReprovaContribuicao/" + co_seq_controle_contribuicao,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja reprovar está contribuição ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});