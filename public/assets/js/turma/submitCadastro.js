$("#formCadTurma").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formCadTurma', function (validate) {

        if ($.parseJSON(validate).operacao) {
            if ($.parseJSON(validate).msg === "create") {
                MsgCadTurma();
            } else {
                MsgEditTurma()
            }
        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            MsgErroTurma();
        }
    });
});

function MsgCadTurma() {
// Override global options
    toastr.success('Turma cadastrada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgEditTurma() {
// Override global options
    toastr.success('Turma editada com sucesso!', '', {
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
// Override global options
    toastr.warning('Erro, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}