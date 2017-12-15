$("#formObservacao").on("submit", function () {
    $(".salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    submit('#formObservacao', function (validate) {
        if (($.parseJSON(validate).operacao)) {
            MsgSucessoObservacao();
        }else{
            MsgErroObservacao();
            $(".salvar").prop("disabled", false);
            $(".sair").prop("disabled", false);
        }
    });
});
function MsgErroObservacao() {
    //// Override global options
    toastr.warning('Aconteceu algum erro ao inserir a observação, por favor contate a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}

function MsgSucessoObservacao() {
// Override global options
    toastr.success('Observação inserida com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        $('.modal').modal('hide');
    }, 2500);
}