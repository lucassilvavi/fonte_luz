$("#tableCursos ").on('click', '.desativar', function () {

    let co_seq_curso = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalDesativarCursos/" + co_seq_curso,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente desativar este curso ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

