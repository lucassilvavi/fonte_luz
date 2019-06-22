$("#formVincularAluno").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formVincularAluno', function (validate) {

        if (validate.operacao === 'vazio') {
            MsgErroVazio();
            $("#salvar").prop("disabled", false);
        }
        else if ($.parseJSON(validate).operacao) {
            MsgAlunoVinculado();
        }  else {
            $("#salvar").prop("disabled", false);
            MsgErroVinculaAluno();
        }
    });
});

function MsgAlunoVinculado() {
// Override global options
    toastr.success('Alunos vinculados com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroVinculaAluno() {
// Override global options
    toastr.warning('Erro, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroVazio() {
// Override global options
    toastr.warning('Por favor, selecione um Usuário!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
}