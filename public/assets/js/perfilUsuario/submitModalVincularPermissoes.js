$("#formVincularPermissao").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit(e,'#formVincularPermissao', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgVincularPermissao();
        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgErroVincularPermissao();
        }
    });
});

function MsgVincularPermissao() {
// Override global options
    toastr.success('Permissões vinculadas com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroVincularPermissao() {
// Override global options
    toastr.warning('Erro ao vincular permissão, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}