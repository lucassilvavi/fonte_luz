$("#formIsencaoContribuicao").on("submit", function () {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit('#formIsencaoContribuicao', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgIsencaoSucesso();
        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgErroIsencao();
        }
    });
});

function MsgIsencaoSucesso() {
// Override global options
    toastr.success('Isenção cadastrado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroIsencao() {
// Override global options
    toastr.warning('Erro ao cadastrar a isenção, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
}