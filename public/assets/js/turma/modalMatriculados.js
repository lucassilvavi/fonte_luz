$(".matriculados").click(function () {
    let co_seq_turma = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalMatriculados/"+co_seq_turma,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Alunos Matrículados');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

