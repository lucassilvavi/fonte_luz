$("#formCadCurso").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formCadCurso', function (validate) {
        if ($.parseJSON(validate).operacao) {
            if ($.parseJSON(validate).msg === "create") {
                MsgCadCurso();
            }else{
                MsgEditCurso();
            }

        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            MsgErroCadCurso();
        }else{
            $("#salvar").prop("disabled", false);
        }

    });
});

function MsgCadCurso() {
// Override global options
    toastr.success('Curso cadastrada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
function MsgEditCurso() {
// Override global options
    toastr.success('Curso editado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroCadCurso() {
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