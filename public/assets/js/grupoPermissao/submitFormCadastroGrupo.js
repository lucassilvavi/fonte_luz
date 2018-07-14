
$("#formGrupoPermissao").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e,'#formGrupoPermissao', function (validate) {
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
    toastr.success('Grupo cadastrado com sucesso!', '', {
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
    toastr.warning('Erro ao cadastrar grupo, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}