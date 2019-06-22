$("#formCadTipoLancamento").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formCadTipoLancamento', function (validate) {
        if ($.parseJSON(validate).operacao) {

            if ($.parseJSON(validate).msg === "create") {
                MsgCadTipoLancamento();
            } else {
                MsgEditTipoLancamento();
            }

        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            MsgErroTipoLancamento();
        }
    });
});

function MsgCadTipoLancamento() {
// Override global options
    toastr.success('Tipo Lançamento cadastrada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgEditTipoLancamento() {
// Override global options
    toastr.success('Tipo Lançamento editado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroTipoLancamento() {
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