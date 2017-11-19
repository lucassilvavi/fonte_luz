$("#formComprovantePorMes").on("submit", function () {
    $("#salvarMes").prop("disabled", true);
    $(".sair").prop("disabled", true);
    submit('#formComprovantePorMes', function (validate) {
        if (validate == false) {
            MsgFaltaComprovante();
            $("#salvarMes").prop("disabled", false);
            $(".sair").prop("disabled", false);
        } else if (($.parseJSON(validate).operacao)) {
            MsgSucessoPorPeriodo();
        }else{
            MsgErroAno();
            $("#salvarMes").prop("disabled", false);
            $(".sair").prop("disabled", false);
        }
    });
});

function MsgFaltaComprovante() {
    //// Override global options
    toastr.warning('Por favor Anexo um comprovante!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}
function MsgErroAno() {
    //// Override global options
    toastr.warning('O campo "Até Ano Contribuição" deve ser menos que o campo "De Ano Contribuição" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}

function MsgSucessoPorPeriodo() {
// Override global options
    toastr.success('Pagamento inserido com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}