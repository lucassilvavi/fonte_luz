$("#tableCursos ").on('click', '.editar', function () {

    let co_seq_curso = $(this).val();

    $.ajax({
        type: "get",
        url: "/modalCadCursos/CursoController@editar/" + co_seq_curso,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Editar Curso');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

