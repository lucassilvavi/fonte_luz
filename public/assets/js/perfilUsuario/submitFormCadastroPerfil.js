$("#formPerfilUsuario").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e,'#formPerfilUsuario', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgPerfilUsuario();
        } else if (validate != false) {
            $("#salvar").prop("disabled", false);
            MsgErroPerfilUsuario();
        }
    });
});

function MsgPerfilUsuario() {
// Override global options
    toastr.success('Perfil cadastrado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroPerfilUsuario() {
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