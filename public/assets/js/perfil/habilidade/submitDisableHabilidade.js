$("#formModalDesableHabilidade").on("submit", function () {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit('#formModalDesableHabilidade', function (validate) {
        if ($.parseJSON(validate).operacao) {
            MsgDesableHabilidade();
        } else if (validate != false){
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgErroDesableHabilidade();
        }
    });
});

function MsgDesableHabilidade() {
// Override global options
    toastr.success('Habilidade excluída com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroDesableHabilidade() {
// Override global options
    toastr.warning('Erro ao excluída habilidade, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}