$(".desmatricular").click(function (event) {
    event.preventDefault();
    let co_seq_turma_usuario = $(".co_seq_turma_usuario").val();
    let id = $(this).val();

    $(".desmatricular").prop("disabled", true);

    $.ajax({
        type: "get",
        url: "/desmatricular/" + co_seq_turma_usuario + "/" + id,
        beforeSend: function () {
        },
        success: function (validate) {

            if ($.parseJSON(validate).operacao) {
                MsgSucessoDesm();

            } else {
                $(".desmatricular").prop("disabled", false);
                MsgErroDesm();
            }

        }
    });
});

function MsgSucessoDesm() {
// Override global options
    toastr.success('Usuário desmatriculado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}


function MsgErroDesm() {
    //// Override global options
    toastr.error('Aconteceu algum erro, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}