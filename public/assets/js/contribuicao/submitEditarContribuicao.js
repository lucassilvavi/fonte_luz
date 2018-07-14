$("#formEditarContribuicao").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    submit(e,'#formEditarContribuicao', function (validate) {
        if (($.parseJSON(validate).operacao)) {
            MsgSucessoEditar();
        }else{
            MsgErroEditar();
            $("#salvar").prop("disabled", false);
            $(".sair").prop("disabled", false);
        }
    });
});

function MsgErroEditar() {
    //// Override global options
    toastr.warning('Aconteceu algum erro ao editar, por favor contate a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}

function MsgSucessoEditar() {
// Override global options
    toastr.success('Contribuição edita com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}