$("#formPermissao").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e,'#formPermissao', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgPermissao();
        } else if (validate != false){
            $("#salvar").prop("disabled", false);
            MsgErroPermissao();
        }
    });
});

function MsgPermissao() {
// Override global options
    toastr.success('Permissão cadastrado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroPermissao() {
// Override global options
    toastr.warning('Erro ao alterar dados pessoais, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}