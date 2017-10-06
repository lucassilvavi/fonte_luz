$("#formTrabalho").on("submit", function() {
    submit('#formTrabalho', function(validate) {
        if ($.parseJSON(validate).operacao) {
            MsgSucessoTrabalho();
        }else {
            MsgErroTrabalho();
        }
    });
});
function MsgSucessoTrabalho() {
// Override global options
    toastr.success('Trabalhos inseridos com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
function MsgErroTrabalho() {
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
