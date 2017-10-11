$("#formModalDesableTelefone").on("submit", function () {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit('#formModalDesableTelefone', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgDesableTelefone();
        } else if (validate != false){
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgErroDesableTelefone();
        }
    });
});

function MsgDesableTelefone() {
// Override global options
    toastr.success('Telefone excluído com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroDesableTelefone() {
// Override global options
    toastr.warning('Erro ao excluir este telefone, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}