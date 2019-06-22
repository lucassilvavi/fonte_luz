$("#formCadEntradaSaida").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formCadEntradaSaida', function (validate) {

        if ($.parseJSON(validate).operacao) {
            if ($.parseJSON(validate).msg === "create") {
                MsgCadEntradaSaida();
            } else {
                MsgEditEntradaSaida()
            }
        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            MsgErroEntradaSaida();
        }
    });
});

function MsgCadEntradaSaida() {
// Override global options
    toastr.success('Tipo Lançamento Entrada e Saída cadastrada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
function MsgEditEntradaSaida() {
// Override global options
    toastr.success('Tipo Lançamento Entrada e Saída editada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroEntradaSaida() {
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