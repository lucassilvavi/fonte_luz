$("#salvar").click(function (event) {
    event.preventDefault();
    let co_seq_turma = $("#co_seq_turma").val();
    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    $.ajax({
        type: "get",
        url: "/desativarTurma/" + co_seq_turma,
        beforeSend: function () {
        },
        success: function (validate) {

            if ($.parseJSON(validate).operacao) {
                MsgSucessoTurma();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);

            } else {
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
                MsgErroTurma();
            }

        }
    });
});

function MsgSucessoTurma() {
// Override global options
    toastr.success('Turma desativada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}


function MsgErroTurma() {
    //// Override global options
    toastr.error('Aconteceu algum erro, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}