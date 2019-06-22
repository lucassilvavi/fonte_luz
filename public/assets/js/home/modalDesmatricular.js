$(".desmatricular").click(function () {
    let co_seq_turma_usuario = $(this).val();
    $.ajax({
        type: "get",
        url: "/modalDesmatricular/" + co_seq_turma_usuario,
        beforeSend: function () {
            $('#myModal').modal('show');
            $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
        },
        success: function (dados) {
            $(".modal-title").html('Deseja realmente sair deste curso ?');
            $("#myModal").modal('show');
            $("#conteudoModal").html(dados);
        }
    });
});

