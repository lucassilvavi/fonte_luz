$("#formEditIsencaoContribuicao").on("submit", function () {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit('#formEditIsencaoContribuicao', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgEdtIsencaoSucesso();
        } else if ($.parseJSON(validate).operacao == false) {
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgEdtErroIsencao();
        }
        $("#sair").prop("disabled", false);
    });
});

function MsgEdtIsencaoSucesso() {
// Override global options
    toastr.success('Isenção editada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgEdtErroIsencao() {
// Override global options
    toastr.warning('Erro ao editar a isenção, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
}