$(".desativar").click(function () {
    let co_seq_turma = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalDesativar/"+co_seq_turma,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente desativar essa Turma ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

